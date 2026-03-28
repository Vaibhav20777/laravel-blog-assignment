<x-app-layout>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-sm sm:rounded-lg mt-6">
        <h1 class="text-3xl font-bold">{{ $post->title }}</h1>
        <p class="text-gray-600">By {{ $post->user->name }}</p>
        <div class="mt-4 text-lg">{{ $post->content }}</div>

        <hr class="my-6">

        <h3 class="font-bold text-xl">Comments</h3>
        @foreach($post->comments as $comment)
            <div class="mt-4 p-4 bg-gray-50 rounded shadow-sm">
                <p>{{ $comment->comment }}</p>
                <small class="text-gray-500">By {{ $comment->user ? $comment->user->name : 'Guest' }}</small>
                
                @if(Auth::id() === $comment->user_id || Auth::id() === $post->user_id)
                    <form method="POST" action="{{ route('comments.destroy', $comment) }}" class="inline">
                        @csrf @method('delete')
                        <button class="text-red-500 text-xs ml-2">Delete</button>
                    </form>
                @endif
            </div>
        @endforeach

        <form method="POST" action="{{ route('comments.store', $post) }}" class="mt-6">
            @csrf
            <textarea name="comment" class="w-full border-gray-300 rounded" placeholder="Leave a comment..." required></textarea>
            <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Post Comment</button>
        </form>
    </div>
</x-app-layout>
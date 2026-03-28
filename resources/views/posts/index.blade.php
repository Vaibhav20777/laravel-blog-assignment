<x-app-layout>
    <div class="max-w-2xl mx-auto p-4">
        <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create New Post</a>
        
        @foreach ($posts as $post)
            <div class="mt-6 p-6 bg-white border-b border-gray-200 shadow-sm rounded-lg">
                <h2 class="text-2xl font-bold">{{ $post->title }}</h2>
                <small>By {{ $post->user->name }} on {{ $post->created_at->format('j M Y, g:i a') }}</small>
                <p class="mt-4">{{ Str::limit($post->content, 100) }}</p>
                
                <div class="mt-4 flex space-x-2">
                    <a href="{{ route('posts.show', $post) }}" class="text-blue-600">View</a>
                    
                    @if(Auth::id() === $post->user_id)
                        <a href="{{ route('posts.edit', $post) }}" class="text-gray-600">Edit</a>
                        <form method="POST" action="{{ route('posts.destroy', $post) }}">
                            @csrf @method('delete')
                            <button type="submit" class="text-red-600">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
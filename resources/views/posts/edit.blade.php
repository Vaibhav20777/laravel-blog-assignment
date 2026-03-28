<x-app-layout>
    <div class="max-w-2xl mx-auto p-6 bg-white mt-6">
        <form method="POST" action="{{ route('posts.update', $post) }}">
            @csrf @method('patch')
            <input type="text" name="title" value="{{ $post->title }}" class="w-full mb-4 border-gray-300 rounded" required>
            <textarea name="content" class="w-full mb-4 border-gray-300 rounded" rows="5" required>{{ $post->content }}</textarea>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update Post</button>
        </form>
    </div>
</x-app-layout>
<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <input type="text" name="title" placeholder="Title" required>
    <textarea name="content" placeholder="Content" required></textarea>
    <button type="submit">Save Post</button>
</form>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('posts.store') }}" class="bg-white p-6 rounded-lg shadow-sm">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700">Title</label>
                    <input type="text" name="title" class="w-full border-gray-300 rounded-md" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Content</label>
                    <textarea name="content" rows="5" class="w-full border-gray-300 rounded-md" required></textarea>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                    Save Post
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
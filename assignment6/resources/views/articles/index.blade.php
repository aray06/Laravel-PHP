<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Articles
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                <form action="{{ route('articles.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium">Title</label>
                        <input type="text" name="title" class="w-full border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium">Content</label>
                        <textarea name="content" class="w-full border-gray-300 rounded-md" required></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Article</button>
                </form>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-bold mb-4">All Articles</h3>
                @foreach($articles as $article)
                    <div class="border-b py-4">
                        <h4 class="text-xl font-semibold">{{ $article->title }}</h4>
                        <p>{{ $article->content }}</p>
                        <p class="text-sm text-gray-500">By: {{ $article->user->name }}</p>
                        <form action="{{ route('articles.destroy', $article) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 text-sm font-bold">
                                Delete Article
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Article: {{ $article->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">

                <form action="{{ route('articles.update', $article) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" value="{{ $article->title }}"
                               class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea name="content" rows="5"
                                  class="w-full border-gray-300 rounded-md shadow-sm" required>{{ $article->content }}</textarea>
                    </div>

                    <div class="flex items-center space-x-4 mt-6">
                        <button type="submit"
                                style="background-color: #16a34a !important; color: white !important; padding: 10px 20px; border-radius: 5px; font-weight: bold; border: none; cursor: pointer; display: inline-block !important;">
                            SAVE CHANGES
                        </button>

                        <a href="{{ route('articles.index') }}" class="text-gray-500 hover:underline">
                            Cancel
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>

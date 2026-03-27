<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Articles
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Форма создания: видна всем, КРОМЕ модератора --}}
            @if(auth()->user()->role !== 'moderator')
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
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-bold">
                            Create Article
                        </button>
                    </form>
                </div>
            @endif

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-bold mb-4">All Articles</h3>

                @foreach($articles as $article)
                    {{-- Проверка доступа: Модератор видит всё, Юзер — только своё --}}
                    @if(auth()->user()->role === 'moderator' || auth()->id() === $article->user_id)
                        <div class="border-b py-4">
                            <h4 class="text-xl font-semibold">{{ $article->title }}</h4>
                            <p class="text-gray-700">{{ $article->content }}</p>
                            <p class="text-sm text-gray-500 mt-1">By: {{ $article->user->name }}</p>

                            <div class="mt-3 flex items-center">
                                {{-- Кнопка Edit --}}
                                <a href="{{ route('articles.edit', $article) }}" class="text-blue-600 hover:text-blue-800 font-bold mr-4 text-sm">
                                    Edit
                                </a>

                                {{-- Кнопка Delete --}}
                                <form action="{{ route('articles.destroy', $article) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-bold text-sm">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div> {{-- Конец блока со списком --}}
        </div>
    </div>
</x-app-layout>

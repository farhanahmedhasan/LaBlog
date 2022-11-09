@extends('layout.app')

@section('appLayout')
    <section>
        <div class="w-4/5 mx-auto mb-8">
            <div class="text-center pt-20">
                <h1 class="text-3xl text-gray-700">
                    All Articles
                </h1>
                <hr class="border border-1 border-gray-300 mt-10">
            </div>

            @if (Auth::user())
                <div class="py-10 sm:py-20">
                    <a class="primary-btn inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400"
                        href="{{ route('posts.create') }}">
                        New Article
                    </a>
                </div>
            @endif
        </div>

        @if (session()->has('message'))
            <div class="pb-10 mx-auto w-4/5">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    Warning
                </div>
                <div class="border border-t-1 border-red-400 rounded-b bg-red-100 text-red-700">
                    {{ session()->get('message') }}
                </div>
            </div>
        @endif

        @foreach ($posts as $post)
            <div class="w-4/5 mx-auto pb-10">
                <div class="bg-white pt-10 rounded-lg drop-shadow-2xl sm:basis-3/4 basis-full sm:mr-8 pb-10 sm:pb-0">
                    <div class="w-11/12 mx-auto pb-10">
                        <h2 class="text-gray-900 text-2xl font-bold pt-6 pb-0 sm:pt-0 hover:text-gray-700 transition-all">
                            <a href="{{ route('posts.show', $post->id) }}">
                                {{ $post->title }}
                            </a>
                        </h2>

                        <p class="text-gray-900 text-lg py-8 w-full break-words">
                            {{ $post->excerpt }}
                        </p>

                        <span class="text-gray-500 text-sm sm:text-base">
                            Made by:
                            <a href=""
                                class="text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all">
                                {{ $post->user->name }}
                            </a>
                            {{ $post->updated_at->diffforhumans() }}
                        </span>

                        @if (Auth::id() === $post->user->id)
                            <a class="block italic text-green-500 border-b-1 border-green-500"
                                href="{{ route('posts.edit', $post->id) }}">
                                Edit
                            </a>

                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="pt-3 pr-3 text-red-500" type="submit">
                                    Delete
                                </button>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach

        <div class="mx-auto w-4/5 pb-10">
            {{ $posts->links() }}
        </div>
    </section>
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-xl font-bold pb-4">Posts of : {{ Auth::user()->name }}</h1>
                </div>

                @foreach (Auth::user()->posts as $post)
                    <h1>{{ $post->title }}</h1>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>

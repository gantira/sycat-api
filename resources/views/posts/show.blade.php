<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex justify-between items-center">
                {{ __($post->title) }}
                <a href="{{ route('posts.edit', $post) }}" class="">Edit</a>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <article class="prose  max-w-none">
                        {!! html_entity_decode($post->body) !!}
                    </article>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

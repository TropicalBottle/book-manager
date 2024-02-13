<x-app-layout>
    <x-slot name="header">
        <h2 class="title-2">
            {{ __('Book Detail: ') }} {{$book->title}}
        </h2>
    </x-slot>

    <div class="mx-20 my-20 p-5 border border-gray-600 rounded">
        <div class="border border-gray-600 rounded w-full my-5 p-5">
            <h3 class="dark:text-gray-400 text-2xl">{{$book->title}}</h3>
            @if($book->description)
                <p class="dark:text-gray-400">{{$book->description}}</p>
            @endif
        </div>
    </div>
</x-app-layout>

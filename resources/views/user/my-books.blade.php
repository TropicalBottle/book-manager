<x-app-layout>
    <x-slot name="header">
        <h2 class="title-2">
            {{ __('My books') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 md:mx-24 md:mb-12 @if(!Auth::user()) md:mt-12 @endif">
        @if(count($user_books) > 0)
            @foreach($user_books as $book)
                <a href="{{route('book-detail', ['id' => $book->id])}}" class="inline-block my-4 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$book->title}}</h5>
                    @if($book->description)
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{$book->description}}</p>
                    @endif
                </a>
            @endforeach
        @else
            <h1 class="title-1">You don't have any books in your library</h1>
        @endif
    </div>
</x-app-layout>

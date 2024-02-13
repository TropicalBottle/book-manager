<x-app-layout>
    <x-slot name="header">
        <h2 class="title-2">
            {{ __('My books') }}
        </h2>
    </x-slot>

    <div class="mx-20 my-20 p-5 border border-gray-600 rounded">
        @if(session('error'))
            <div class="alert alert-error col-span-3">
                <i class="inline-block sidebar-group-parent-arrow reversed-sidebar-arrow" data-eva="alert-triangle-outline" data-eva-fill="#7f1d1d"></i> {{ session('error') }}
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success col-span-3">
                <i class="inline-block sidebar-group-parent-arrow reversed-sidebar-arrow" data-eva="checkmark-outline" data-eva-fill="#14532D"></i>{{ session('success') }}
            </div>
        @endif

        <form method="post" class="mt-6 space-y-6">
            <h2 class="title-2">
                {{ __('Add a book to your library') }}
            </h2>
            @csrf
            <select name="book">
                @foreach($books as $book)
                    <option value="{{$book->id}}">{{$book->title}}</option>
                @endforeach
            </select>
            <x-primary-button>{{ __('Add book') }}</x-primary-button>
        </form>
    </div>
    <div class="mx-20 my-20 p-5 border border-gray-600 rounded">
        @foreach($user_books as $book)
            <div class="border border-gray-600 rounded w-full my-5 p-5">
                <h3 class="dark:text-gray-400 text-2xl">{{$book->title}}</h3>
                @if($book->description)
                    <p class="dark:text-gray-400">{{$book->description}}</p>
                @endif
            </div>
        @endforeach
    </div>
</x-app-layout>

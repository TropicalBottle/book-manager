<x-app-layout>
    <x-slot name="header">
        <h2 class="title-2">
            {{ __('Book lists') }}
        </h2>
    </x-slot>

    @if(Auth::user())
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
                @csrf
                <x-input-label for="title" :value="__('Name of the book')" />
                <x-text-input name="title" placeholder="Book name" />

                <x-input-label for="description" :value="__('Description of the book')" />
                <x-textarea-input name="description" placeholder="Book description" />

                <br>
                <x-primary-button>{{ __('Create book') }}</x-primary-button>
            </form>
        </div>
    @endif
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 md:mx-24 md:mb-12 @if(!Auth::user()) md:mt-12 @endif">
        @foreach($books as $book)
            <a href="{{route('book-detail', ['id' => $book->id])}}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$book->title}}</h5>
                @if($book->description)
                    <p class="font-normal text-gray-700 dark:text-gray-400">{{$book->description}}</p>
                @endif
            </a>
        @endforeach
    </div>
</x-app-layout>

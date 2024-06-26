<x-app-layout>
    <x-slot name="header">
        <h2 class="title-2">
            {{ __('Book Detail: ') }} {{$book->title}}
        </h2>
    </x-slot>

    <div class="mx-20 my-20 p-5 rounded">
        <div class="rounded w-full p-5">
            <h3 class="dark:text-gray-400 title-1">{{$book->title}}</h3>
            @if($book->description)
                <p class="dark:text-gray-400 md:mt-4">{{$book->description}}</p>
            @endif

            {{-- @TODO: Check if book already in library--}}
            @auth()
                @php
                    try {
                        $wishlist_entry = \App\Models\Wishlist::where('user_id', auth()->user()->id)
                                                                ->where('book_id', $book->id)
                                                                ->firstOrFail();
                        $in_wishlist = true;
                    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                        $wishlist_entry = null;
                        $in_wishlist = false;
                    }
                @endphp
                {{--TODO: the button is only working once--}}
                <div class="inline-block">
                    <livewire:wishlist-button key="{{ now() }}" :wishlist="$wishlist_entry" :user_id="auth()->user()->id" :book_id="$book->id"
                                              :in_wishlist="$in_wishlist"></livewire:wishlist-button>
                    <livewire:delete-button key="{{now()}}" :book="$book"></livewire:delete-button>
                </div>
            @endauth
            @if(!$already_to_library)
                <form method="POST">
                    @csrf
                    <input type="hidden" name="book" value="{{$book->id}}">
                    <x-primary-button class="my-4">{{ __('Add to library') }}</x-primary-button>
                    @if(session('error'))
                        <div class="alert alert-error col-span-3">
                            <i class="inline-block sidebar-group-parent-arrow reversed-sidebar-arrow"
                               data-eva="alert-triangle-outline" data-eva-fill="#7f1d1d"></i> {{ session('error') }}
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success col-span-3">
                            <i class="inline-block sidebar-group-parent-arrow reversed-sidebar-arrow"
                               data-eva="checkmark-outline" data-eva-fill="#14532D"></i>{{ session('success') }}
                        </div>
                    @endif
                </form>
            @else
                <form method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="book" value="{{$book->id}}">
                    <x-primary-button class="my-4">{{ __('Remove book from library') }}</x-primary-button>
                    @if(session('error'))
                        <div class="alert alert-error col-span-3">
                            <i class="inline-block sidebar-group-parent-arrow reversed-sidebar-arrow"
                               data-eva="alert-triangle-outline" data-eva-fill="#7f1d1d"></i> {{ session('error') }}
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success col-span-3">
                            <i class="inline-block sidebar-group-parent-arrow reversed-sidebar-arrow"
                               data-eva="checkmark-outline" data-eva-fill="#14532D"></i>{{ session('success') }}
                        </div>
                    @endif
                </form>
            @endif
            <livewire:comment-section :reviews="$reviews"/>
        </div>
    </div>
</x-app-layout>

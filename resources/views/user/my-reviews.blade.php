<x-app-layout>
    <x-slot name="header">
        <h2 class="title-2">
            {{ __('My reviews') }}
        </h2>
    </x-slot>

    @foreach($user_reviews as $review)
        <div class="m-auto relative w-3/4 block">
            @if(auth()->user() && auth()->user()->id == $review->user_id)
                <div class="absolute right-4 top-2" x-data="{ open: false }">
                    <button @click="open = ! open" id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            type="button">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                        </svg>
                        <span class="sr-only">Comment settings</span>
                    </button>
                    <!-- Dropdown menu -->
                    <div :class="{'block': open, 'hidden': ! open}" id="dropdownComment1"
                         class="absolute hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownMenuIconHorizontalButton">
                            {{--                                        <li>--}}
                            {{--                                            <button--}}
                            {{--                                                    class="block w-full py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</button>--}}
                            {{--                                        </li>--}}
                            <li>
                                <button wire:click="deleteReview({{$review->id}})" wire:key="{{$review->id}}"
                                        class="remove-button block w-full py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</button>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif
            <a href="{{route('book-detail', ['id' => $review->book_id])}}">
                <article class="my-6 p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex flex-col md:flex-row items-center">
                            <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                <svg class="mr-2 w-6 h-6 rounded-full" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100" fill="none">
                                    <rect width="100%" height="100%" rx="50%" fill="#B4C3CC"/>
                                    <text x="50%" y="50%" font-size="60" text-anchor="middle" dy=".3em" fill="#FFFFFF" font-family="Arial, sans-serif">{{\App\Models\User::where('id', $review->user_id)->first()->name[0]}}</text>
                                </svg>
                                {{\App\Models\User::where('id', $review->user_id)->first()->name}}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">{{$review->created_at->format('d/m/Y')}}</time></p>
                        </div>
                    </footer>


                    <div class="flex items-center mt-2 mb-4">
                        @for($i = 0; $i < 5; $i++)
                            @if($i < $review->review_amount)
                                <span class="text-yellow-300">&#9733;</span>
                            @else
                                <span class="text-gray-300">&#9733;</span>
                            @endif
                        @endfor
                    </div>


                    <p class="text-gray-500 dark:text-gray-400">{{$review->review_content}}</p>
                </article>
            </a>
        </div>
    @endforeach
</x-app-layout>

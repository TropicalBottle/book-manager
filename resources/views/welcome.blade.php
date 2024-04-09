<x-app-layout>
    <section>
        <div class="px-4 mx-auto max-w-screen-xl text-center">
            <h1 class="mb-4 mt-10 text-4xl font-extrabold tracking-tight leading-none text-primary md:text-5xl lg:text-6xl dark:text-d-primary">
                Your Reading Passport</h1>
            <p class="mb-8 text-lg font-normal text-text lg:text-xl sm:px-16 xl:px-48 dark:text-d-text">Keep track
                of all the books you could have read, and what you thought about them and share them with your
                friends.</p>
            <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                @if(auth()->user())
                    <a href="{{route('my-books')}}"
                       class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-text rounded-lg bg-secondary hover:bg-accent dark:bg-d-secondary focus:ring-4 focus:ring-secondary dark:focus:ring-d-secondary">
                        Access book list
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </a>
                @else
                    <a href="{{route('register')}}"
                       class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-text rounded-lg bg-secondary hover:bg-accent dark:bg-d-secondary focus:ring-4 focus:ring-secondary dark:focus:ring-d-secondary">
                        Create an account
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </a>
                @endif
                <a href="#"
                   class="underline inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-text dark:text-d-text rounded-lg">
                    <svg class="mr-2 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path>
                    </svg>
                    Make me useful too
                </a>
            </div>
        </div>
    </section>
    <section>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-base font-semibold leading-7 text-primary dark:text-d-primary">Core features</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight dark:text-d-text sm:text-4xl">Everything you need keep track of your readings</p>
                <p class="mt-6 text-lg leading-8 text-text dark:text-d-text">Quis tellus eget adipiscing convallis sit sit eget
                    aliquet quis. Suspendisse eget egestas a elementum pulvinar et feugiat blandit at. In mi viverra
                    elit nunc.</p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                    <div class="relative pl-16">
                        <dt class="features-title">
                            <div
                                class="features-picto">
                                <svg class="h-6 w-6 text-text dark:text-d-background" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z"/>
                                </svg>
                            </div>
                            Add & review books
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-text dark:text-d-text">Keep track of all the books you add to your account and add a review so you'll always remember what a book make you felt.
                        </dd>
                    </div>
                    <div class="relative pl-16">
                        <dt class="features-title">
                            <div
                                class="features-picto">
                                <svg class="h-6 w-6 text-text dark:text-d-background" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg>                            </div>
                            Wishlist your next books
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-text dark:text-d-text">If you don't want to forget the next book to read, add and review, you can add it to your wishlist and retrieve it easily.
                        </dd>
                    </div>
                    <div class="relative pl-16">
                        <dt class="features-title">
                            <div
                                class="features-picto">
                                <svg class="h-6 w-6 text-text dark:text-d-background" xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>

                            </div>
                            Share your watchlist
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-text dark:text-d-text">If you want to share your thought about a specific book, you can send the review to anyone.
                        </dd>
                    </div>
                    <div class="relative pl-16">
                        <dt class="features-title">
                            <div
                                class="features-picto">
                                <svg class="h-6 w-6 text-text dark:text-d-background" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            </div>
                            Create a reading group
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-text dark:text-d-text">Arcu egestas dolor vel iaculis in ipsum
                            mauris. Tincidunt mattis aliquet hac quis. Id hac maecenas ac donec pharetra eget.
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

    </section>
</x-app-layout>

<form wire:submit.prevent="postComment" class="mb-6">
    <div class="star-rating">
        @for ($i = 1; $i <= 5; $i++)
            <input type="radio" id="review_{{ $i }}" @if($i == 3) checked @endif name="rating" wire:model="rating" value="{{ $i }}">
            <label for="review_{{ $i }}">&#9733;</label>
        @endfor
    </div>

    <div
        class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <label for="review" class="sr-only">Your review</label>
        <textarea wire:model="review" rows="6"
                  class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                  placeholder="Write a review..." required></textarea>

    </div>

    <x-primary-button class="my-4">{{ __('Post review') }}</x-primary-button>
</form>


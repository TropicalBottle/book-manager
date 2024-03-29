<div>
    @if($in_wishlist)
        <x-primary-button wire:click="removeWishlist" class="my-4">{{ __('Remove from wishlist') }}</x-primary-button>
    @else
        <x-primary-button wire:click="addWishlist" class="my-4">{{ __('Add to wishlist') }}</x-primary-button>
    @endif
</div>

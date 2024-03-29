<?php

namespace App\Livewire;

use App\Models\Wishlist;
use Illuminate\View\View;
use Livewire\Component;
use function Laravel\Prompts\error;

class WishlistButton extends Component
{
    public $book_id;
    public $user_id;
    public $wishlist;
    public $in_wishlist;

    public function mount($wishlist, int $user_id, int $book_id, bool $in_wishlist): void {
        $this->wishlist = $wishlist;
        $this->user_id = $user_id;
        $this->book_id = $book_id;
        $this->in_wishlist = $in_wishlist;
    }

    public function hydrate(): void
    {
        \Log::info("update");
    }

    public function addWishlist(): void
    {
        \Log::info("Coucou 1");
        $wishlist = new Wishlist();
        $wishlist->user_id = $this->user_id;
        $wishlist->book_id = $this->book_id;
        $wishlist->save();

        $this->in_wishlist = true;
        $this->dispatch('wishlistUpdated');
    }

    public function removeWishlist(): void
    {
        \Log::info("Coucou 2");
        $this->wishlist->delete();
        $this->in_wishlist = false;
        $this->dispatch('wishlistUpdated');
    }

    public function render(): View
    {
        return view('livewire.wishlist-button');
    }
}

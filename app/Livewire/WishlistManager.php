<?php

namespace App\Livewire;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistManager extends Component
{
    public $movieId;
    public $seriesId;

    public function addToWishlist()
    {
        $this->validate([
            'movieId' => ['nullable', 'exists:movies,id'],
            'seriesId' => ['nullable', 'exists:series,id'],
        ]);

        Wishlist::create([
            'user_id' => Auth::id(),
            'movie_id' => $this->movieId,
            'series_id' => $this->seriesId,
        ]);

        session()->flash('message', 'Added to wishlist!');
    }

    public function render()
    {
        $wishlists = Wishlist::where('user_id', Auth::id())->with(['movie', 'series'])->get();
        return view('livewire.wishlist-manager', compact('wishlists'));
    }
}

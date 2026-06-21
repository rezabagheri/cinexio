<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h2 class="mb-4 text-xl font-semibold">My Wishlist</h2>

            @if (session('message'))
                <div class="mb-4 text-green-600">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit="addToWishlist" class="mb-6">
                <div class="flex space-x-4">
                    <div>
                        <label for="movieId" class="block text-sm font-medium text-gray-700">Movie ID</label>
                        <input wire:model="movieId" type="number" id="movieId" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" />
                        @error('movieId') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="seriesId" class="block text-sm font-medium text-gray-700">Series ID</label>
                        <input wire:model="seriesId" type="number" id="seriesId" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" />
                        @error('seriesId') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                            Add to Wishlist
                        </button>
                    </div>
                </form>

                <h3 class="mb-2 text-lg font-semibold">Your Wishlist</h3>
                <ul class="divide-y divide-gray-200">
                    @foreach ($wishlists as $wishlist)
                        <li class="py-2">
                            @if ($wishlist->movie)
                                {{ $wishlist->movie->title }} (Movie)
                            @elseif ($wishlist->series)
                                {{ $wishlist->series->title }} (Series)
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

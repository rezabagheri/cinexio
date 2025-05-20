<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
       <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
           <div class="p-6 bg-white border-b border-gray-200">
               <h2 class="mb-4 text-xl font-semibold">Edit Profile</h2>

               @if (session('message'))
                   <div class="mb-4 text-green-600">
                       {{ session('message') }}
                   </div>
               @endif

               <form wire:submit="updateProfile">
                   <div class="mb-4">
                       <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                       <input wire:model="username" type="text" id="username" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" />
                       @error('username') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                   </div>

                   <div class="mb-4">
                       <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                       <textarea wire:model="bio" id="bio" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"></textarea>
                       @error('bio') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                   </div>

                   <div class="mb-4">
                       <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                       <input wire:model="location" type="text" id="location" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" />
                       @error('location') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                   </div>

                   <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                       Save
                   </button>
               </form>
           </div>
       </div>
   </div>

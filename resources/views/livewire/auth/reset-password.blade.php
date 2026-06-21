<div class="max-w-md p-6 mx-auto bg-white rounded-lg shadow-md dark:bg-zinc-800">
    <h2 class="mb-6 text-2xl font-bold text-gray-900 dark:text-white">{{ __('Reset Password') }}</h2>
    <p class="mb-4 text-sm text-gray-600 dark:text-gray-400">{{ __('Enter your new password to reset.') }}</p>
    @if (session('status'))
        <div class="mb-4 text-green-600 dark:text-green-400">
            {{ session('status') }}
        </div>
    @endif
    <form wire:submit.prevent="resetPassword">
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Email') }}</label>
            <input wire:model="email" type="email" id="email" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-zinc-700 dark:border-zinc-600 dark:text-white" />
            @error('email') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Password') }}</label>
            <input wire:model="password" type="password" id="password" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-zinc-700 dark:border-zinc-600 dark:text-white" />
            @error('password') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Confirm Password') }}</label>
            <input wire:model="password_confirmation" type="password" id="password_confirmation" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-zinc-700 dark:border-zinc-600 dark:text-white" />
        </div>
        <div class="mb-4">
            <button type="submit" class="w-full px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">{{ __('Reset Password') }}</button>
        </div>
        <div class="text-center">
            <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:underline dark:text-indigo-400">{{ __('Back to Login') }}</a>
        </div>
    </form>
</div>

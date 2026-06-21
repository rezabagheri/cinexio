<?php

   /**
    * Cinexio - A personal movie and series archive management system with social networking features.
    *
    * This file is part of the Cinexio project, a free software for managing and sharing movie archives.
    *
    * @package Cinexio
    * @author Reza Bagheri <rezabagheri@gmail.com>
    * @copyright 2025 Reza Bagheri
    * @license MIT License
    * @version 1.0.0
    * @link https://github.com/rezabagheri/cinexio
    */

   namespace App\Livewire;

   use App\Models\User;
   use Livewire\Component;
   use Illuminate\Support\Facades\Auth;

   /**
    * Class UserProfile
    *
    * Livewire component for displaying and editing user profile information.
    */
   class UserProfile extends Component
   {
       public $user;
       public $username;
       public $bio;
       public $location;

       /**
        * Mount the component and load the authenticated user's data.
        *
        * @return void
        */
       public function mount()
       {
           $this->user = Auth::user();
           $this->username = $this->user->username;
           $this->bio = $this->user->bio;
           $this->location = $this->user->location;
       }

       /**
        * Update the user's profile information.
        *
        * @return void
        */
       public function updateProfile()
       {
           $this->validate([
               'username' => ['required', 'string', 'max:255', 'unique:users,username,' . $this->user->id],
               'bio' => ['nullable', 'string', 'max:1000'],
               'location' => ['nullable', 'string', 'max:255'],
           ]);

           $this->user->update([
               'username' => $this->username,
               'bio' => $this->bio,
               'location' => $this->location,
           ]);

           session()->flash('message', 'Profile updated successfully!');
       }

       /**
        * Render the component's view.
        *
        * @return \Illuminate\View\View
        */
       public function render()
       {
           return view('livewire.user-profile');
       }
   }

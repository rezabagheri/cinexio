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
// use Illuminate\Contracts\Auth\MustVerifyEmail;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property \Illuminate\Support\Carbon|null $two_factor_confirmed_at
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|Review[] $reviews
 * @property-read \Illuminate\Database\Eloquent\Collection|Rating[] $ratings
 * @property-read \Illuminate\Database\Eloquent\Collection|Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|Watchlist[] $watchlists
 * @property-read \Illuminate\Database\Eloquent\Collection|Favorite[] $favorites
 * @property-read \Illuminate\Database\Eloquent\Collection|Playlist[] $playlists
 * @property-read \Illuminate\Database\Eloquent\Collection|Notification[] $notifications
 * @property-read UserSetting|null $userSettings
 * @property-read \Illuminate\Database\Eloquent\Collection|ActivityLog[] $activityLogs
 * @property-read \Illuminate\Database\Eloquent\Collection|ApiToken[] $apiTokens
 * @property-read \Illuminate\Database\Eloquent\Collection|PaymentTransaction[] $paymentTransactions
 * @property-read \Illuminate\Database\Eloquent\Collection|SocialConnection[] $socialConnections
 * @property-read \Illuminate\Database\Eloquent\Collection|SharedLink[] $sharedLinks
 * @property-read \Illuminate\Database\Eloquent\Collection|FriendRequest[] $friendRequests
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'two_factor_confirmed_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var string[]
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'two_factor_confirmed_at' => 'datetime',
    ];

    /**
     * Get all reviews written by the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get all ratings given by the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    /**
     * Get all comments written by the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get all watchlists created by the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function watchlists()
    {
        return $this->hasMany(Watchlist::class);
    }

    /**
     * Get all favorites of the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    /**
     * Get all playlists created by the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function playlists()
    {
        return $this->hasMany(Playlist::class);
    }

    /**
     * Get all notifications for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    /**
     * Get the user settings for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userSettings()
    {
        return $this->hasOne(UserSetting::class);
    }

    /**
     * Get all activity logs for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }

    /**
     * Get all API tokens for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function apiTokens()
    {
        return $this->hasMany(ApiToken::class);
    }

    /**
     * Get all payment transactions for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentTransactions()
    {
        return $this->hasMany(PaymentTransaction::class);
    }

    /**
     * Get all social connections for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function socialConnections()
    {
        return $this->hasMany(SocialConnection::class);
    }

    /**
     * Get all shared links for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sharedLinks()
    {
        return $this->hasMany(SharedLink::class);
    }

    /**
     * Get all friend requests for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function friendRequests()
    {
        return $this->hasMany(FriendRequest::class);
    }
}

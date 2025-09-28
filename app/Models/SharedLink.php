<?php

/**
 * Cinexio - A personal movie and series archive management system with social networking features.
 *
 * This file is part of the Cinexio project, a free software for managing and sharing movie archives.
 *
 * @package    Cinexio
 * @author     Reza Bagheri <rezabagheri@gmail.com>
 * @copyright  2025 Reza Bagheri
 * @license    MIT License
 * @version    1.0.0
 * @link       https://github.com/rezabagheri/cinexio
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class SharedLink
 *
 * Represents a shared link for a movie, created by a user.
 *
 * @property int $id Primary key
 * @property int $user_id Foreign key referencing the user
 * @property int $movie_id Foreign key referencing the movie
 * @property string $token Unique token for the shared link
 * @property string $type Type of shared link access (view, download, edit)
 * @property int $usage_count Number of times the link has been used
 * @property string|null $message Optional message with the shared link
 * @property \Illuminate\Support\Carbon|null $expires_at Expiration time of the link
 * @property bool $is_active Whether the link is active
 * @property-read User $user The user who created the link
 * @property-read Movie $movie The movie being shared
 */
class SharedLink extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'movie_id',
        'token',
        'type',
        'usage_count',
        'message',
        'expires_at',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'usage_count' => 'integer',
        'is_active' => 'boolean',
        'expires_at' => 'datetime',
    ];

    /**
     * Get the user who created the shared link.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the movie associated with the shared link.
     *
     * @return BelongsTo
     */
    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
}

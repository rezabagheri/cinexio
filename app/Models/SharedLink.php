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
 * @property \Illuminate\Support\Carbon|null $expires_at Expiration time of the link
 * @property bool $is_active Whether the link is active
 * @property-read User $user The user who created the link
 * @property-read Movie $movie The movie being shared
 */
class SharedLink extends Model
{
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

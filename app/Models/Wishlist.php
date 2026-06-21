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

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Wishlist
 *
 * Represents a wishlist entry for a movie or series in the Cinexio system.
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $movie_id
 * @property int|null $series_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Wishlist extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'movie_id',
        'series_id',
    ];

    /**
     * Get the user that owns this wishlist entry.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the movie associated with this wishlist entry.
     *
     * @return BelongsTo
     */
    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }

    /**
     * Get the series associated with this wishlist entry.
     *
     * @return BelongsTo
     */
    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }
}

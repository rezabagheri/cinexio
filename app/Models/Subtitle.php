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
 * Class Subtitle
 *
 * Represents a subtitle for a movie or episode in the Cinexio system.
 *
 * @property int $id
 * @property int|null $movie_id
 * @property int|null $episode_id
 * @property string $language
 * @property string|null $file_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Subtitle extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'movie_id',
        'episode_id',
        'language',
        'file_path',
    ];

    /**
     * Get the movie associated with this subtitle.
     *
     * @return BelongsTo
     */
    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }

    /**
     * Get the episode associated with this subtitle.
     *
     * @return BelongsTo
     */
    public function episode(): BelongsTo
    {
        return $this->belongsTo(Episode::class);
    }
}

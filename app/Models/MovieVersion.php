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
 * Class MovieVersion
 *
 * Represents a specific version of a movie in the Cinexio system.
 *
 * @property int $id
 * @property int $movie_id
 * @property string|null $version_type
 * @property string|null $quality
 * @property int|null $duration
 * @property int|null $disk_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class MovieVersion extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'movie_id',
        'version_type',
        'quality',
        'duration',
        'disk_id',
    ];

    /**
     * Get the movie that this version belongs to.
     *
     * @return BelongsTo
     */
    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }

    /**
     * Get the disk where this version is stored.
     *
     * @return BelongsTo
     */
    public function disk(): BelongsTo
    {
        return $this->belongsTo(Disk::class);
    }
}

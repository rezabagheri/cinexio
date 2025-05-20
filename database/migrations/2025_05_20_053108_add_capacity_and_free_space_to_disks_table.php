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
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Disk
 *
 * Represents a storage disk in the Cinexio system.
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int|null $capacity
 * @property int|null $free_space
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Disk extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'capacity',
        'free_space',
    ];

    /**
     * Get the movie versions stored on this disk.
     *
     * @return HasMany
     */
    public function movieVersions(): HasMany
    {
        return $this->hasMany(MovieVersion::class);
    }
}

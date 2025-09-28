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

/**
 * Class Disk
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int|null $capacity
 * @property int|null $free_space
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|Episode[] $episodes
 * @property-read \Illuminate\Database\Eloquent\Collection|MovieVersion[] $movieVersions
 * @property-read \Illuminate\Database\Eloquent\Collection|Subtitle[] $subtitles
 */
class Disk extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'capacity',
        'free_space',
    ];

    /**
     * Get all episodes stored on this disk.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    /**
     * Get all movie versions stored on this disk.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movieVersions()
    {
        return $this->hasMany(MovieVersion::class);
    }

    /**
     * Get all subtitles stored on this disk.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subtitles()
    {
        return $this->hasMany(Subtitle::class);
    }
}

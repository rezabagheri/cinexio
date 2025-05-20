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
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Person
 *
 * Represents an individual (e.g., director, actor) in the Cinexio system.
 *
 * @property int $id
 * @property string $name
 * @property int|null $birth_year
 * @property string|null $bio
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Person extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'birth_year',
        'bio',
    ];

    /**
     * Get the movies associated with this person.
     *
     * @return BelongsToMany
     */
    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class, 'movie_person')->withPivot('role');
    }

    /**
     * Get the series associated with this person.
     *
     * @return BelongsToMany
     */
    public function series(): BelongsToMany
    {
        return $this->belongsToMany(Series::class, 'series_person')->withPivot('role');
    }
}

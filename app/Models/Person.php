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
 * Class Person
 *
 * @property int $id
 * @property string $name
 * @property string|null $bio
 * @property string|null $imdb_id
 * @property string|null $birthdate
 * @property string|null $deathdate
 * @property string|null $gender
 * @property string|null $place_of_birth
 * @property string|null $photo
 * @property string|null $known_for
 * @property string|null $website
 * @property float|null $popularity
 * @property array|null $aliases
 * @property array|null $social_links
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at

 * @property-read \Illuminate\Database\Eloquent\Collection|Movie[] $movies
 */
class Person extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'persons';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'biography',
        'birth_date',
        'death_date',
        'nationality',
    ];

    /**
     * The movies associated with the person.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_people', 'person_id', 'movie_id');
    }

    /**
     * The series associated with the person.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function series()
    {
        return $this->belongsToMany(Series::class, 'series_people', 'person_id', 'series_id');
    }
}

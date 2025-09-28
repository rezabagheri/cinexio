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
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Series
 *
 * Represents a TV series in the Cinexio archive.
 *
 * @property int $id Primary key
 * @property string $title The title of the series
 * @property string|null $original_title The original title of the series
 * @property string|null $description A brief description or synopsis
 * @property int|null $start_year The year the series started
 * @property int|null $end_year The year the series ended
 * @property float|null $rating Rating out of 10
 * @property string|null $age_rating Age rating, e.g., TV-14
 * @property array|null $countries Countries of production
 * @property string|null $original_language Original language
 * @property string|null $imdb_id IMDb ID
 * @property string|null $tmdb_id TMDB ID
 * @property string|null $poster_url URL to the poster image
 * @property-read \Illuminate\Support\Collection|Season[] $seasons The seasons of the series
 * @property-read \Illuminate\Support\Collection|Person[] $people The people associated with the series
 */
class Series extends Model
{
    /**
     * The genres associated with the series.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function genres()
    {
        return $this->belongsToMany(\App\Models\Genre::class, 'series_genre');
    }

    /**
     * The tags associated with the series.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(\App\Models\Tag::class, 'series_tag');
    }
    /**
     * Get the seasons for the series.
     *
     * @return HasMany
     */
    public function seasons(): HasMany
    {
        return $this->hasMany(Season::class);
    }

    /**
     * The people (cast, crew) associated with the series.
     *
     * @return BelongsToMany
     */
    public function people(): BelongsToMany
    {
        return $this->belongsToMany(Person::class, 'series_person')->withPivot('role')->withTimestamps();
    }

    /**
     * Genres as JSON or pivot (if using pivot, define relation)
     */
    // public function genres(): BelongsToMany
    // {
    //     return $this->belongsToMany(Genre::class, 'series_genre');
    // }

    /**
     * Tags as JSON or pivot (if using pivot, define relation)
     */
    // public function tags(): BelongsToMany
    // {
    //     return $this->belongsToMany(Tag::class, 'series_tag');
    // }
}

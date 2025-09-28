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
 * Class Movie
 *
 * @property int $id
 * @property string $title
 * @property string|null $original_title
 * @property string|null $description
 * @property int|null $year
 * @property string|null $release_date
 * @property int|null $runtime
 * @property string|null $imdb_id
 * @property string|null $tmdb_id
 * @property string|null $poster_url
 * @property string|null $backdrop_url
 * @property string|null $trailer_url
 * @property string|null $language
 * @property array|null $countries
 * @property string|null $age_rating
 * @property int|null $budget
 * @property int|null $revenue
 * @property float|null $rating
 * @property int|null $votes
 * @property string|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at

 * @property-read \Illuminate\Database\Eloquent\Collection|Genre[] $genres
 * @property-read \Illuminate\Database\Eloquent\Collection|Review[] $reviews
 * @property-read \Illuminate\Database\Eloquent\Collection|Rating[] $ratings
 * @property-read \Illuminate\Database\Eloquent\Collection|Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|Favorite[] $favorites
 * @property-read \Illuminate\Database\Eloquent\Collection|Playlist[] $playlists
 * @property-read \Illuminate\Database\Eloquent\Collection|Tag[] $tags
 * @property-read \Illuminate\Database\Eloquent\Collection|MovieVersion[] $versions
 * @property-read \Illuminate\Database\Eloquent\Collection|Person[] $people
 */
class Movie extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'original_title',
        'description',
        'year',
        'release_date',
        'runtime',
        'imdb_id',
        'tmdb_id',
        'poster_url',
        'backdrop_url',
        'trailer_url',
        'original_language',
        'countries',
        'age_rating',
        'budget',
        'revenue',
        'rating',
        'votes',
        'status',
    ];

    /**
     * The genres associated with the movie.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function genres()
    {
    return $this->belongsToMany(Genre::class, 'movie_genre');
    }

    /**
     * Get all reviews for the movie.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get all ratings for the movie.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    /**
     * Get all comments for the movie.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get all favorites for the movie.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    /**
     * Get all playlists containing the movie.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function playlists()
    {
    return $this->belongsToMany(Playlist::class, 'playlist_movie');
    }

    /**
     * Get all tags for the movie.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
    return $this->belongsToMany(Tag::class, 'movie_tag');
    }

    /**
     * Get all versions for the movie.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function versions()
    {
        return $this->hasMany(MovieVersion::class);
    }

    /**
     * Get all people associated with the movie.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function people()
    {
    return $this->belongsToMany(Person::class, 'movie_person');
    }
}

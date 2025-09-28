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
 * Class Season
 *
 * @property int $id
 * @property int $series_id
 * @property string $title
 * @property int $number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property-read Series $series
 * @property-read \Illuminate\Database\Eloquent\Collection|Episode[] $episodes
 */
class Season extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'series_id',
        'season_number',
        'title',
        'description',
        'start_date',
        'end_date',
        'poster_url',
        'episodes_count',
    ];

    /**
     * Get the series that owns the season.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    /**
     * Get all episodes for the season.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}

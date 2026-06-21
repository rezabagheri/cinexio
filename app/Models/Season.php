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
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Season
 *
 * Represents a season of a series in the Cinexio system.
 *
 * @property int $id
 * @property int $series_id
 * @property int $season_number
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Season extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'series_id',
        'season_number',
        'description',
    ];

    /**
     * Get the series that this season belongs to.
     *
     * @return BelongsTo
     */
    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }

    /**
     * Get the episodes associated with this season.
     *
     * @return HasMany
     */
    public function episodes(): HasMany
    {
        return $this->hasMany(Episode::class);
    }
}

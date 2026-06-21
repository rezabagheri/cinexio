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
 * Class Episode
 *
 * Represents an episode of a season in the Cinexio system.
 *
 * @property int $id
 * @property int $season_id
 * @property int $episode_number
 * @property string|null $title
 * @property int|null $duration
 * @property int|null $disk_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Episode extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'season_id',
        'episode_number',
        'title',
        'duration',
        'disk_id',
    ];

    /**
     * Get the season that this episode belongs to.
     *
     * @return BelongsTo
     */
    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    /**
     * Get the disk where this episode is stored.
     *
     * @return BelongsTo
     */
    public function disk(): BelongsTo
    {
        return $this->belongsTo(Disk::class);
    }
}

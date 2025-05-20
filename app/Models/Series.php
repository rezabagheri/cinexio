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
 * Class Series
 *
 * Represents a series entity in the Cinexio system.
 *
 * @property int $id
 * @property string $title
 * @property string|null $original_title
 * @property int|null $start_year
 * @property int|null $end_year
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Series extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'original_title',
        'start_year',
        'end_year',
        'description',
    ];

    /**
     * Get the seasons associated with this series.
     *
     * @return HasMany
     */
    public function seasons(): HasMany
    {
        return $this->hasMany(Season::class);
    }
}

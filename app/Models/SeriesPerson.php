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
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class SeriesPerson
 *
 * Represents the pivot model for the relationship between Series and Person.
 *
 * @property int $id Primary key
 * @property int $series_id Foreign key referencing the series
 * @property int $person_id Foreign key referencing the person
 * @property string|null $role Role of the person (e.g., Director, Actor)
 * @property-read Series $series The related series
 * @property-read Person $person The related person
 */
class SeriesPerson extends Model
{
    /**
     * Get the series for this pivot.
     *
     * @return BelongsTo
     */
    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }

    /**
     * Get the person for this pivot.
     *
     * @return BelongsTo
     */
    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }
}

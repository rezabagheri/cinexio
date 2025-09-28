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
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Tag
 *
 * Represents a tag that can be assigned to movies.
 *
 * @property int $id Primary key
 * @property string $name Name of the tag
 * @property string|null $description Optional description of the tag
 * @property-read \Illuminate\Database\Eloquent\Collection|Movie[] $movies The movies associated with this tag
 */
class Tag extends Model
{
    /**
     * The movies associated with this tag.
     *
     * @return BelongsToMany
     */
    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class, 'movie_tag');
    }
}

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
 * Class Watchlist
 *
 * Represents a user's watchlist item for a movie.
 *
 * @property int $id Primary key
 * @property int $movie_id Foreign key referencing the movie
 * @property int $user_id Foreign key referencing the user
 * @property \Illuminate\Support\Carbon|null $planned_at Planned time to watch
 * @property bool $watched Whether the movie has been watched
 * @property-read User $user The user who owns this watchlist item
 * @property-read Movie $movie The movie in the watchlist
 */
class Watchlist extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'watchlist';
    /**
     * Get the user who owns this watchlist item.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the movie in the watchlist.
     *
     * @return BelongsTo
     */
    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
}

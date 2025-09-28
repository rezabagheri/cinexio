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
use App\Enums\SocialConnectionStatus;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class SocialConnection
 *
 * Represents a social connection (friendship) between two users.
 *
 * @property int $id Primary key
 * @property int $user_id Foreign key referencing the user
 * @property int $friend_id Foreign key referencing the friend (user)
 * @property string $status Friendship status (pending, accepted, rejected, blocked)
 * @property-read User $user The user who initiated the connection
 * @property-read User $friend The friend user
 */
class SocialConnection extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'friend_id',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'status' => SocialConnectionStatus::class,
    ];

    /**
     * Get the user who initiated the connection.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the friend user in the connection.
     *
     * @return BelongsTo
     */
    public function friend(): BelongsTo
    {
        return $this->belongsTo(User::class, 'friend_id');
    }
}

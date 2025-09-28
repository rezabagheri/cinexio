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
use App\Enums\FriendRequestStatus;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FriendRequest
 *
 * @property int $id
 * @property int $sender_id
 * @property int $receiver_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property-read User $sender
 * @property-read User $receiver
 */
class FriendRequest extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'status',
        'message',
    ];

    protected $casts = [
        'status' => FriendRequestStatus::class,
    ];

    /**
     * Get the user who sent the friend request.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    /**
     * Get the user who received the friend request.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}

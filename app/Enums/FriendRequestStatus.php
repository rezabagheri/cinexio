<?php
/**
 * Cinexio - Enum for Friend Request Status
 *
 * Defines the possible statuses for a friend request.
 *
 * @package    Cinexio
 * @author     Reza Bagheri <rezabagheri@gmail.com>
 * @copyright  2025 Reza Bagheri
 * @license    MIT License
 * @version    1.0.0
 * @link       https://github.com/rezabagheri/cinexio
 */

namespace App\Enums;

enum FriendRequestStatus: string
{
    case Pending = 'pending';
    case Accepted = 'accepted';
    case Blocked = 'blocked';
    case Rejected = 'rejected';
}

<?php
/**
 * Cinexio - Enum for Social Connection Status
 *
 * Defines the possible statuses for a social connection (friendship).
 *
 * @package    Cinexio
 * @author     Reza Bagheri <rezabagheri@gmail.com>
 * @copyright  2025 Reza Bagheri
 * @license    MIT License
 * @version    1.0.0
 * @link       https://github.com/rezabagheri/cinexio
 */

namespace App\Enums;

enum SocialConnectionStatus: string
{
    case Pending = 'pending';
    case Accepted = 'accepted';
    case Rejected = 'rejected';
    case Blocked = 'blocked';
}

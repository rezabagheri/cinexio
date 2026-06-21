<?php
/**
 * Cinexio - Enum for movie wanted status
 *
 * Defines the possible statuses for movie wanted status.
 *
 * @package    Cinexio
 * @author     Reza Bagheri <rezabagheri@gmail.com>
 * @copyright  2025 Reza Bagheri
 * @license    MIT License
 * @version    1.0.0
 * @link       https://github.com/rezabagheri/cinexio
 */
namespace App\Enums;

enum WantedStatus: string
{
    case Pending = 'searching';
    case Canceled = 'cancel';
    case Downloading = 'downloading';
    case finded = 'finded';
    case added = 'added';
}

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
 * Class UserSetting
 *
 * Represents user-specific settings and preferences.
 *
 * @property int $id Primary key
 * @property int $user_id Foreign key referencing the user
 * @property string|null $language Preferred language
 * @property bool $notifications_enabled Whether notifications are enabled
 * @property string|null $theme Preferred theme
 * @property-read User $user The user who owns these settings
 */
class UserSetting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'language',
        'notifications_enabled',
        'theme',
        'settings',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'notifications_enabled' => 'boolean',
        'settings' => 'array',
    ];

    /**
     * Get the user who owns these settings.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

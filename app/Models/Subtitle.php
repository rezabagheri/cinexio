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
 * Class Subtitle
 *
 * Represents a subtitle file associated with a disk.
 *
 * @property int $id Primary key
 * @property int $disk_id Foreign key referencing the disk
 * @property string $language Language of the subtitle
 * @property string|null $file_path File path of the subtitle
 * @property string|null $format Format of the subtitle file
 * @property-read Disk $disk The disk where the subtitle is stored
 */
class Subtitle extends Model
{
    /**
     * Get the disk where the subtitle is stored.
     *
     * @return BelongsTo
     */
    public function disk(): BelongsTo
    {
        return $this->belongsTo(Disk::class);
    }
}

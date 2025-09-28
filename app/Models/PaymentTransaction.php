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
use App\Enums\PaymentTransactionStatus;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentTransaction
 *
 * @property int $id
 * @property int $user_id
 * @property string $transaction_id
 * @property float $amount
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property-read User $user
 */
class PaymentTransaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'transaction_id',
        'amount',
        'currency',
        'payment_method',
        'status',
        'description',
        'gateway_response',
    ];

    protected $casts = [
        'amount' => 'float',
        'status' => PaymentTransactionStatus::class,
        'gateway_response' => 'array',
    ];

    /**
     * Get the user that owns the payment transaction.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

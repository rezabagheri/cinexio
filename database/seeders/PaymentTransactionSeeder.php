<?php
/**
 * Cinexio - Seeder for payment_transactions table
 *
 * Seeds the payment_transactions table with realistic payment records, using enum, extra fields, and gateway response.
 *
 * @package    Cinexio
 * @author     Reza Bagheri <rezabagheri@gmail.com>
 * @copyright  2025 Reza Bagheri
 * @license    MIT License
 * @version    1.0.0
 * @link       https://github.com/rezabagheri/cinexio
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentTransaction;
use App\Models\User;
use App\Enums\PaymentTransactionStatus;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PaymentTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $userIds = User::pluck('id')->toArray();
        $currencies = ['USD', 'EUR', 'IRR', 'GBP', 'CAD'];
        $methods = ['credit_card', 'paypal', 'stripe', 'bank_transfer', 'wallet'];
        $statuses = [
            PaymentTransactionStatus::Pending,
            PaymentTransactionStatus::Completed,
            PaymentTransactionStatus::Failed,
        ];
        $total = 0;
        foreach ($userIds as $userId) {
            $numTx = $faker->numberBetween(2, 8);
            for ($i = 0; $i < $numTx; $i++) {
                PaymentTransaction::create([
                    'user_id' => $userId,
                    'transaction_id' => strtoupper(Str::random(12)),
                    'amount' => $faker->randomFloat(2, 1, 500),
                    'currency' => $faker->randomElement($currencies),
                    'payment_method' => $faker->randomElement($methods),
                    'status' => $faker->randomElement($statuses),
                    'description' => $faker->optional()->realText(40),
                    'gateway_response' => [
                        'gateway' => $faker->randomElement($methods),
                        'code' => $faker->randomNumber(4),
                        'message' => $faker->optional()->realText(30),
                        'success' => $faker->boolean(80),
                    ],
                ]);
                $total++;
            }
        }
        $this->command?->info("Seeded $total payment_transactions records.");
    }
}

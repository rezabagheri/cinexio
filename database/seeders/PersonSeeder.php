<?php
/**
 * Cinexio - Seeder for persons table
 *
 * Seeds the persons table with 100 realistic people using Faker.
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
use App\Models\Person;
use Faker\Factory as Faker;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 100; $i++) {
            Person::create([
                'name' => $faker->name(),
                'biography' => $faker->optional()->paragraph(2),
                'birth_date' => $faker->date('Y-m-d', '-20 years'),
                'death_date' => $faker->optional(0.1)->date('Y-m-d', '-1 years'),
                'nationality' => $faker->country,
            ]);
        }
    }
}

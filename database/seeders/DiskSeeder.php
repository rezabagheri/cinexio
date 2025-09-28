<?php
/**
 * Cinexio - Seeder for disks table
 *
 * Seeds the disks table with 30 sample disks for development/testing.
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
use App\Models\Disk;
use Faker\Factory as Faker;

class DiskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 30; $i++) {
            Disk::create([
                'name' => strtoupper($faker->bothify('DISK-##??')),
                'description' => $faker->optional()->sentence(8),
                'capacity' => $faker->numberBetween(500, 8000), // in GB
                'free_space' => $faker->numberBetween(0, 8000), // in GB
            ]);
        }
    }
}

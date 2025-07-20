<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 15; $i++) {
            DB::table('pms')->insert([
                'id' => Str::uuid()->toString(),
                'pms_name' => $faker->company . ' PMS',
                'description' => $faker->sentence(5),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

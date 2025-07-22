<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        // get random pms_id
        $pms_ids = DB::table('pms')->pluck('id')->toArray();
        $pms_id = $faker->randomElement($pms_ids);

        for ($i = 0; $i < 500; $i++) {
            DB::table('customers')->insert([
                'id' => Str::uuid()->toString(),
                'customer_name' => $faker->company() . '-' . $i + 1,
                'pms_id' => $pms_id,
                'os_server' => $faker->randomElement(['Windows', 'MacOS', 'Ubuntu']),
                'ip_server' => $faker->ipv4(),
                'server_type' => $faker->randomElement(['cloud', 'on-premise']),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

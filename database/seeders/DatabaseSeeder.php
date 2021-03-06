<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('### Seeding Users ###');
        $this->call(UserSeeder::class);

        echo "\x07"; // BEL makes my terminal blinky
    }
}

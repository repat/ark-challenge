<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $seedUsers = [
            [
                'name' => 'Rene',
                'email' => 'mail@rpschultz.de',
                'email_verified_at' => now(),
                'password' => Hash::make('Qwerty123'),
            ],
            [
                'name' => 'Ark Tester',
                'email' => 'ark@rpschultz.de',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ]
        ];

        // ProgressBar on the console
        $output = new ConsoleOutput();
        $progress = new ProgressBar($output, count($seedUsers));
        $progress->start();

        foreach ($seedUsers as $user) {
            // So I don't have to create a user everything I remigrate/reseed everything
            User::create($user);
            $progress->advance();
        }

        $progress->finish();
        echo PHP_EOL;
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'first_name' => "admin",
            'last_name' => "web",
            'email' => 'admin@admin.com',
            'password' => \Hash::make('password'),
        ]);

        $this->command->info("User Admin berhasil diinsert");
    }
}

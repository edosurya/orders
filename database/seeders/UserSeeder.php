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
            'name' => "admin",
            'email' => 'admin@admin.com',
            'role' => 1,
            'password' => \Hash::make('password'),
        ]);

        $this->command->info("User Admin berhasil diinsert");
    }
}

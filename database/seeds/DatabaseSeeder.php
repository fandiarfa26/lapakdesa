<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'User123',
            'username' => 'user123',
            'email' => 'user123@mail.com',
            'password' => Hash::make('123456'),
            'alamat' => 'Dau, Malang',
            'no_hp' => '08987654321',
            'role' => 1
        ]);

        User::create([
            'nama' => 'AdminSumbersekar',
            'username' => 'adminss',
            'email' => 'adminss@mail.com',
            'password' => Hash::make('adminss'),
            'alamat' => 'Dau, Malang',
            'no_hp' => '08123456789',
            'role' => 2
        ]);
    }
}

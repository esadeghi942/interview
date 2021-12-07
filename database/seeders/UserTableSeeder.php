<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'is_admin' => '1',
            'phone' => '09365439172',
            'time_weekly_working'=>0,
            'password' => Hash::make('12345678'),
        ]);
    }
}

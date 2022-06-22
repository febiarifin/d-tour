<?php

namespace Database\Seeders;

use App\Models\User;

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
        User::factory()->create([
            'name'=>'administrator',
            'username' => 'admin',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('password'),
            'address' => 'Anonym',
            'role' => 'admin'
        ]);
    }
}

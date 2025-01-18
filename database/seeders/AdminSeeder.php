<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'], 
            [
                'name' => 'User', 
                'password' =>'password123', // Secure password
                'role' => 'admin', 
            ]
        );

        Admin::updateOrCreate(
            ['email' => 'admin@gmail.com'], 
            [
                'Username' => 'User', 
                'password' => 'password123', // Secure password
                 
            ]
        );
        
        
    }
}

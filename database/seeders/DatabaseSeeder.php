<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@dasharathchand.gov.np',
                'password' => Hash::make('Nepal@123'),
                'email_verified_at' => Carbon::now(),
                'role' => 'admin',
                'remember_token' => 'Nepal@123',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'ward_no' => '08'
            ],
        ]);
    }
}

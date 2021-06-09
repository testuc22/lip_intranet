<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
			      'role_id' => 1,        
          	'first_name' => 'Sonu',
          	'Last_name' => 'Kumar',
          	'email' => 'admin@gmail.com',
          	'password' => Hash::make('password'),
          	'phone_number' => '1234567890',
          	'created_at' => Carbon::now(),
          	'updated_at' => Carbon::now(),
        ]);
    }
}

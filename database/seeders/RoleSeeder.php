<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$roles = [
    		[
    			'name' => 'Admin',
    			'created_at' => Carbon::now(),
    			'updated_at' => Carbon::now(),
    		],
    		[
    			'name' => 'Manager',
    			'created_at' => Carbon::now(),
    			'updated_at' => Carbon::now(),
    		],
    		[
    			'name' => 'Employee',
    			'created_at' => Carbon::now(),
    			'updated_at' => Carbon::now(),
    		]

    	];
    	foreach ($roles as $key => $role) {
    		DB::table('roles')->insert($role);
    	}
    }
}

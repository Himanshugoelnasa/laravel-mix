<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	[
	            'name' => 'Nikon',
	            'type' => 'Mirrorless',
	            'model' => 'YEB28264',
	            'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'Canon',
	            'type' => 'Full Frame',
	            'model' => 'YWH2006',
	            'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'Sony',
	            'type' => 'Point To Shot',
	            'model' => 'ONNS2007',
	            'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'GoPro',
	            'type' => 'Gyro',
	            'model' => 'BZGS2009',
	            'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
	        ]
	    ]);
    }
}

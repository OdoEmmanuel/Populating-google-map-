<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResturantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creates resturant entries
        DB::table('resturants')->insert([
            'name' => 'Number one Pizza',
            'address' => '30 oladejo street Saboo',
            'city' => 'Ikeja',
            'state' => 'Lagos',
            'hours' => '9:00am-6:00pm',
            'latitude' => 29.45563,
            'longitude' => 83.51134,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('resturants')->insert([
            'name' => 'Deicious Burgers',
            'address' => '16 Jide Tiawo street Saboo',
            'city' => 'Ikeja',
            'state' => 'Lagos',
            'hours' => '8:00am-7:00pm',
            'latitude' => 27.43463,
            'longitude' => 93.51134,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('resturants')->insert([
            'name' => 'Amazing Shawama',
            'address' => '10 Adebayo street Saboo',
            'city' => 'Ikeja',
            'state' => 'Lagos',
            'hours' => '10:00am-8:00pm',
            'latitude' => 24.41423,
            'longitude' => 63.23211,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}

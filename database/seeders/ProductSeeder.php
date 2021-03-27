<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'name'=>'mi Mobile',
                'price'=>'10000',
                'category'=>'mobile',
                'gallary'=>'https://cdn.pixabay.com/photo/2016/11/29/12/30/android-1869510_1280.jpg',
                'description'=>'smartphone 4gb RAM, dual sim card'
            ],
            [
                'name'=>'LG fridge',
                'price'=>'15000',
                'category'=>'refrigerator',
                'gallary'=>'https://media.istockphoto.com/vectors/open-fridge-with-products-isolated-on-white-color-banner-vector-id996071962',
                'description'=>'15 liter with 10 years warranty'
            ],
            [
                'name'=>'TV LG',
                'price'=>'12000',
                'category'=>'TV',
                'gallary'=>'https://4.imimg.com/data4/PR/VO/MY-17088056/lg-led-tv-500x500.jpg',
                'description'=>'smart TV 4gb RAM, 32inch display'
            ],
            [
                'name'=>'panosonic TV',
                'price'=>'18000',
                'category'=>'TV',
                'gallary'=>'https://cdn.pixabay.com/photo/2013/07/13/01/08/monitor-155158_1280.png',
                'description'=>'smart TV 4gb RAM, 32inch display'
            ],
            [
                'name'=>'onida fridege',
                'price'=>'10000',
                'category'=>'refrigerator',
                'gallary'=>'https://cdn.pixabay.com/photo/2017/06/19/18/03/refrigerator-2420417_960_720.png',
                'description'=>'15 liter with 10 years warranty'
            ]
        ]);
    }
}

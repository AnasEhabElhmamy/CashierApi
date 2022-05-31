<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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

        DB::table('product')->insert([[
            'Name' => 'Cola',
            'Description' => 'Woow Aans',
            'Barcode' =>12554452,
            'Type' =>'Drink',
            'DatePurchase'=>\Carbon\Carbon::createFromDate(2000,01,01)->toDateTimeString(),
            'Quantity'=>5.4,
            'PriceBuy'=>50.6,
            'PriceSelling'=>60.0,
            'Validity'=>1


        ],
        [
            'Name' => 'Checken',
            'Description' => 'Woow Checken',
            'Barcode' =>1252,
            'Type' =>'Mailk',
            'DatePurchase'=>\Carbon\Carbon::createFromDate(2000,01,01)->toDateTimeString(),
            'Quantity'=>5.4,
            'PriceBuy'=>50.6,
            'PriceSelling'=>60.0,
            'Validity'=>2

        ]
    ,[
            'Name' => 'Meat',
            'Description' => 'Woow Meat',
            'Barcode' =>1252,
            'Type' =>'Meates',
            'DatePurchase'=>\Carbon\Carbon::createFromDate(2000,01,01)->toDateTimeString(),
            'Quantity'=>5.4,
            'PriceBuy'=>50.6,
            'PriceSelling'=>60.0,
            'Validity'=>1

    ]]);
    }
}

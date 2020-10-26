<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UtentiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("utenti")->insert([
            [
                "customer"=>1,
                "date"=>"2015-04-01",
                "valuta"=>"£",
                "value"=>"50.00"
            ],
            [
                "customer"=>2,
                "date"=>"2015-04-01",
                "valuta"=>"$",
                "value"=>"66.10"
            ],
            [
                "customer"=>2,
                "date"=>"2015-04-02",
                "valuta"=>"€",
                "value"=>"12.00"
            ],
            [
                "customer"=>2,
                "date"=>"2015-04-02",
                "valuta"=>"£",
                "value"=>"6.50"
            ],
            [
                "customer"=>1,
                "date"=>"2015-04-02",
                "valuta"=>"£",
                "value"=>"11.04"
            ],
            [
                "customer"=>1,
                "date"=>"2015-04-02",
                "valuta"=>"€",
                "value"=>"1.00"
            ],
            [
                "customer"=>1,
                "date"=>"2015-04-03",
                "valuta"=>"$",
                "value"=>"23.05"
            ],
            [
                "customer"=>2,
                "date"=>"2015-04-04",
                "valuta"=>"€",
                "value"=>"6.50"
            ]
        ]);
    }
}

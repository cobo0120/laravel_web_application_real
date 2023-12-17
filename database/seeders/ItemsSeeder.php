<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;//追記
use DateTime;//追記(現在の日時を取得したいなら必要)

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'post_id'=>'1',
            'consumable_equipment_id'=>'1',
            'product_name'=>'ダミー商品',
            'unit_purchase_price'=>'100',
            'purchase_quantities'=>'10',
            'units'=>'式',
            'account_id'=>'1',
            'created_at'=>'2023-06-01 00:00:00',
            'updated_at'=>'2023-06-01 00:00:00',
        ]);
    }
}

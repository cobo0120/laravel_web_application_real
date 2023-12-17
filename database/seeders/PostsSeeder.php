<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;//追記
use DateTime;//追記(現在の日時を取得したいなら必要)

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'application_status'=>'1',
            'application_day'=>'20231031',
            'user_id'=>'1',
            'department_id'=>'1',
            'purchase'=>'アスクル',
            'purchasing_url'=>'url',
            'purpose_of_use'=>'在庫不足のため',
            'delivery_hope_day'=>'20231031',
            'subtotal'=>'10000',
            'tax_amount'=>'10000',
            'total_amount'=>'10000',
            'remarks'=>'備考',
            'delivery_day'=>'20231031',
            'created_at'=>'2023-06-01 00:00:00',
            'updated_at'=>'2023-06-01 00:00:00',
            
        ]);
    }
}

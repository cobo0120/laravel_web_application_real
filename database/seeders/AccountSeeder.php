<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Account;//該当のモデルへのuse宣言
use Illuminate\Support\Facades\DB;//追記
use DateTime;//追記(現在の日時を取得したいなら必要)


class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            'account' => '消耗品費',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);  

        DB::table('accounts')->insert([
            'account' => '備品費',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);  

        DB::table('accounts')->insert([
            'account' => '印刷費',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);  

        DB::table('accounts')->insert([
            'account' => '雑費',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);  
    }
}

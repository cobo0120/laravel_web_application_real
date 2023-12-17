<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Consumable;//該当のモデルへのuse宣言
use Illuminate\Support\Facades\DB;//追記
use DateTime;//追記(現在の日時を取得したいなら必要)


class ConsumablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consumables_equipments')->insert([
            'consumables_equipment' => '文具',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);

        DB::table('consumables_equipments')->insert([
            'consumables_equipment' => 'トナー',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);

        DB::table('consumables_equipments')->insert([
            'consumables_equipment' => '印刷用紙',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);

        DB::table('consumables_equipments')->insert([
            'consumables_equipment' => 'その他',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        }
    }





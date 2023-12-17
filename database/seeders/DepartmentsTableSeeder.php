<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;//該当のモデルへのuse宣言
use Illuminate\Support\Facades\DB;//追記
use DateTime;//追記(現在の日時を取得したいなら必要)

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'department_name' => '営業部',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('departments')->insert([
            'department_name' => '人事部',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('departments')->insert([
            'department_name' => '経理部',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('departments')->insert([
            'department_name' => '総務部',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}

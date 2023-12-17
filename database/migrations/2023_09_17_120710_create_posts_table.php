<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();//申請No
            $table->string('application_status')->nullable();//ステータス
            $table->string('application_day');//申請日付
            $table->foreignId('user_id');//申請者名
            $table->foreignId('department_id');//部署名
            $table->string('purchase');//購入先
            $table->text('purchasing_url')->nullable();//購入先URL
            $table->text('purpose_of_use');//利用目的
            $table->string('delivery_hope_day');//納品希望日
            // $table->foreignId('consumables_equipment_id');//区分
            // $table->string('product_name');//商品名
            // $table->integer('unit_purchase_price');//購入単価
            // $table->integer('purchase_quantity');//数量
            // $table->string('unit');//単位
            // $table->foreignId('account_id');//勘定科目
            $table->integer('subtotal');//小計
            $table->integer('tax_amount');//消費税合計
            $table->integer('total_amount');//合計
            $table->text('remarks')->nullable();//備考
            $table->string('delivery_day')->nullable();//納品日(購買担当者入力欄)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};

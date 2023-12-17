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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id');//リレーションID
            $table->foreignId('consumable_equipment_id');//区分
            $table->string('product_name');//商品名
            $table->integer('unit_purchase_price');//購入単価
            $table->integer('purchase_quantities');//数量
            $table->string('units');//単位
            $table->foreignId('account_id');//勘定科目
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
        Schema::dropIfExists('items');
    }
};

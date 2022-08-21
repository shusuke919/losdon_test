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
            $table->string('JANcode')->nullable();//JANコード
            $table->string('ItemName')->nullable();//商品名
            $table->string('ItemImage_path')->nullable();//商品画像のパス
            $table->string('ItemWeight')->nullable();//商品重量
            $table->string('ItemSize')->nullable();//商品寸法
            $table->string('BoxSize')->nullable();//箱寸法（外寸）
            $table->string('TempRange')->nullable();//温度帯（常温／冷蔵／冷凍）
            $table->string('NumofItems')->nullable();//入数
            $table->string('RetailPrice')->nullable();//小売希望価格
            $table->integer('Inventory')->nullable();//在庫数量
            $table->dateTime('BestBefore')->nullable();//賞味期限
            $table->string('StorageLocation')->nullable();//在庫地
            $table->dateTime('InventoryDeadline')->nullable();//在庫期限
            $table->string('DeliveryDate')->nullable();//納期（出荷依頼してX日）
            $table->string('Packing')->nullable();//荷姿（パレット/バラ積み）
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_category', function (Blueprint $table) {
            $table->bigIncrements('category_id');
            $table->string('category_name', '100')->default('')->comment('商品分类名称');
            $table->integer('pid')->default('0')->comment('属分类上级');
            $table->tinyInteger('status')->default('1')->comment('状态');
            $table->tinyInteger('sort')->default('50')->comment('排序');
            $table->timestamps();
        });

        Schema::create('goods', function (Blueprint $table) {
            $table->bigIncrements('attr_id');
            $table->string('goods_name', '200')->default('')->comment('商品名称');
            $table->string('goods_desc', '500')->default('')->comment('商品描述');
            $table->string('goods_picture', '255')->default('')->comment('商品主图');
            $table->text('picture_list')->nullable(false)->comment('商品图片组');
//            $table->integer('category_id')->default('0')->comment('主分类');
            $table->string('nums', '100')->default('')->comment('参团人数');
            $table->decimal('price')->default('0.00')->comment('价格(均价)');
            $table->tinyInteger('status')->default('1')->comment('状态');
            $table->tinyInteger('sort')->default('50')->comment('排序');
            $table->timestamps();
        });

        Schema::create('goods_category_link', function (Blueprint $table) {
            $table->integer('goods_id')->default('0')->comment('商品id');
            $table->integer('category_id', '')->default('')->comment('主分类id');
            $table->integer('category_id_1', '')->default('')->comment('二级分类');
            $table->integer('category_id_2', '')->default('')->comment('三级分类');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_category');
        Schema::dropIfExists('goods');

    }
}

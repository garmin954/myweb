<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->bigIncrements('goods_id');
            $table->string('goods_name', '200')->default('')->comment('商品名称');
            $table->string('goods_desc', '500')->default('')->comment('商品描述');
            $table->string('goods_picture', '255')->default('')->comment('商品主图');
            $table->text('picture_list')->nullable(false)->comment('商品图片组');
//            $table->integer('category_id')->default('0')->comment('主分类');
            $table->string('nums', '100')->default('')->comment('参团人数');
            $table->decimal('price')->default('0.00')->comment('价格(均价)');
            $table->tinyInteger('avg')->default('1')->comment('参与人均价');
            $table->tinyInteger('status')->default('1')->comment('状态');
            $table->tinyInteger('sort')->default('50')->comment('排序');
            $table->text('content')->nullable(false)->comment('内容');
            $table->tinyInteger('is_top')->default('0')->comment('是否推荐');
            $table->float('discount', 4, 2)->default('10')->comment('折扣');
            $table->tinyInteger('sale_type')->default('1')->comment('营销展示类型 1满意度 2折扣 3销量 4团购');
            $table->string('sale_value', '100')->default('')->comment('营销展示值');
            $table->timestamps();


        });


        Schema::create('goods_category_link', function (Blueprint $table) {
            $table->bigIncrements('gc_id');
            $table->integer('goods_id')->default('0')->comment('商品id');
            $table->integer('category_id')->default('0')->comment('主分类id');
            $table->integer('category_id_1')->default('0')->comment('二级分类');
            $table->integer('category_id_2')->default('0')->comment('三级分类');
        });

        DB::statement("ALTER TABLE yl_goods_category comment'商品分类表'");//表注释
        DB::statement("ALTER TABLE yl_goods comment'商品表'");//表注释
        DB::statement("ALTER TABLE yl_goods_category_link comment'商品分类关联表'");//表注释

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
        Schema::dropIfExists('goods_category_link');
    }
}

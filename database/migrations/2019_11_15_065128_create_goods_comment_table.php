<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateGoodsCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_comment', function (Blueprint $table) {
            $table->bigIncrements('comm_id');
            $table->string('name', '50')->default('')->comment('姓名');
            $table->string('mobile', '12')->default('')->comment('电话');
            $table->integer('goods_id')->default('0')->comment('商品id');
            $table->text('content')->nullable()->comment('内容');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE yl_goods_comment COMMENT '评论留言表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_comment');
    }
}

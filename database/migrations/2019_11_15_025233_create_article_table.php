<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->bigIncrements('art_id');
            $table->string('title', '100')->default('')->comment('文章标题');
            $table->tinyInteger('category_id')->default('0')->comment('所属分类');
            $table->string('article_desc', '250')->default('')->comment('描述');
            $table->string('thumb', '250')->default('')->comment('图片');
            $table->text('content')->nullable(false)->comment('内容');
            $table->tinyInteger('status')->default('1')->comment('状态');

            $table->tinyInteger('is_top')->default('0')->comment('是否推荐');
            $table->tinyInteger('sort')->default('50')->comment('排序');
            $table->timestamps();
        });

        Schema::create('article_category', function (Blueprint $table){
            $table->bigIncrements('category_id');
            $table->string('category_name', '100')->default('')->comment('分类名称');
            $table->tinyInteger('pid')->default('0')->comment('上级分类');
            $table->tinyInteger('is_top')->default('0')->comment('是否推荐');
            $table->tinyInteger('status')->default('1')->comment('状态');
            $table->tinyInteger('sort')->default('50')->comment('排序');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE yl_article COMMENT '文章表'");
        DB::statement("ALTER TABLE yl_article_category COMMENT '文章分类表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
        Schema::dropIfExists('article_category');
    }
}

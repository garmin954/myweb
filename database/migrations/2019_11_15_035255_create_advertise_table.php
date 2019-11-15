<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAdvertiseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertise', function (Blueprint $table) {
            $table->bigIncrements('adv_id');
            $table->string('adv_name', '100')->default('')->comment('名称');
            $table->string('thumb', '100')->default('')->comment('压缩图片');
            $table->string('link', '250')->default('')->comment('链接');
            $table->tinyInteger('sort')->default('50')->comment('排序');
            $table->integer('type_id')->default('0')->comment('所属分类');
            $table->timestamps();
        });

        Schema::create('advertise_type', function (Blueprint $table) {
            $table->bigIncrements('type_id');
            $table->string('type_name', '100')->default('')->comment('名称');
            $table->tinyInteger('sort')->default('50')->comment('排序');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE yl_advertise COMMENT '广告'");
        DB::statement("ALTER TABLE yl_advertise_type COMMENT '广告分类'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertise');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('admin_name', '100')->unique()->default('')->comment('管理员名称');
            $table->string('password', '36')->default('')->comment('密码');
            $table->tinyInteger('status')->default('1')->comment('状态');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE yl_admin COMMENT '管理员'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}

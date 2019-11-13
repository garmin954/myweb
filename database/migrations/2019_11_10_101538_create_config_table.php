<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config', function (Blueprint $table) {
            $table->bigIncrements('config_id');
            $table->string('config_name', '100')->comment('配置名称')->unique();
            $table->string('config_code', '100')->comment('配置代码')->unique();
            $table->text('value')->comment('值')->nullable($value = true);
            $table->string('values', '200')->default('1')->comment('多选值');
            $table->tinyInteger('status')->default('1')->comment('状态');
            $table->string('desc', '200')->default('')->comment('描述');
            $table->tinyInteger('config_type')->default('1')->comment('配置表单类型');
            $table->tinyInteger('type_id')->default('1')->comment('所属类型');
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
        Schema::dropIfExists('config');
    }
}

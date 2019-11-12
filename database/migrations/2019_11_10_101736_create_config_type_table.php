<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_type', function (Blueprint $table) {
            $table->bigIncrements('type_id')->comment('分类id');
            $table->string('type_name', '100')->default('')->comment('配置分类名称');
            $table->tinyInteger('status')->default(1)->comment('配置状态');
            $table->string('type_desc', '250')->default('')->comment('配置描述');
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
        Schema::dropIfExists('config_type');
    }
}

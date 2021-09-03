<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateModuleTable extends Migration
{
    public $tableName = "module";

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable($this->tableName)) $this->create();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }

    /**
     * 执行创建表
     */
    private function create()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';      // 设置存储引擎
            $table->charset = 'utf8';       // 设置字符集
            $table->collation  = 'utf8_general_ci';       // 设置排序规则

            $table->id();
            $table->string('name', 100)->nullable(false)->comment("模块名称")->unique("name_unique");
            $table->string('key', 100)->nullable(false)->comment("模块标识")->unique("key_unique");
            $table->string("pic")->nullable(false)->default("")->comment("模块图片");
            $table->timestamps();
        });
        $prefix = DB::getConfig('prefix');
        $qu = "ALTER TABLE " . $prefix . $this->tableName . " comment '模块表'";
        DB::statement($qu);
    }
}

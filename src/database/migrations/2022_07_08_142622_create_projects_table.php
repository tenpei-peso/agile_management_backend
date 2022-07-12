<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id');
            $table->string('owner_name')->comment('取引先');
            $table->string('name')->comment('プロジェクト名');
            $table->string('photo_path')->comment('画像のパス');
            $table->date('dead_line')->comment('納期');
            $table->integer('man_hour')->comment('工数');
            $table->integer('earning')->comment('売り上げ');
            $table->integer('expense')->comment('経費');
            $table->date('renewal_date')->comment('更新日');
            $table->string('remark')->comment('備考');
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
        Schema::dropIfExists('projects');
    }
}

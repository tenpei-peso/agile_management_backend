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
            $table->foreignId('owner_id')->constrained();
            // $table->string('owner_name')->comment('取引先');
            $table->string('name')->comment('プロジェクト名');
            $table->date('dead_line')->comment('納期');
            $table->integer('man_hour')->comment('現状工数');
            $table->integer('expected_man_hour')->comment('予定工数');
            $table->integer('earning')->comment('最新売り上げ');
            $table->integer('expense')->comment('最新経費');
            $table->date('renewal_date')->comment('契約更新日');
            $table->string('remark')->comment('課題');
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

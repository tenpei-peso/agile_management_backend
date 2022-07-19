<?php

use Composer\Semver\Constraint\Constraint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimecardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timecards', function (Blueprint $table) {
            $table->id();
            $table->integer('order')->comment('同じ日のデータが複数ある場合の区別');
            $table->foreignId('project_user_id')->references('id')->on('projects_users');
            $table->date('year_month_date')->comment('2022-06-21など');
            $table->integer('year_month')->comment('202206など');
            $table->integer('ticket_number')->comment('チケットNO');
            $table->string('ticket_name')->comment('チケット名');
            $table->time('start_time')->comment('12:00など');
            $table->time('finish_time')->comment('12:00など');
            $table->integer('rest_time')->comment('1など');
            $table->integer('expense')->comment('経費');
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
        Schema::dropIfExists('timecards');
    }
}

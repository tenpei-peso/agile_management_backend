<?php

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
            $table->unsignedBigInteger('id')->comment('updateOrCreateするため2020060701など');
            $table->foreignId('user_id');
            $table->foreignId('project_id');
            $table->string('year_month')->comment('2022-06など');
            $table->integer('day')->comment('2など');
            $table->time('start_time')->comment('12:00など');
            $table->time('finish_time')->comment('12:00など');
            $table->integer('rest_time')->comment('1など');
            $table->integer('expenses')->comment('経費');
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

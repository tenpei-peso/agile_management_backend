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
            $table->unsignedBigInteger('dateTimeId')->comment('20200607など');
            $table->foreignId('user_project_id')->references('id')->on('users_projects');
            $table->integer('order')->comment('同日に複数チケットを選択したときを順番で区別');
            $table->integer('ticketNumber')->comment('チケットNO');
            $table->time('startTime')->comment('開始時間');
            $table->time('endTime')->comment('終了時間');
            $table->integer('breakTime')->comment('休憩時間、分表示？？');
            $table->integer('otherCost')->comment('経費');
            $table->string('costDetail')->comment('経費の備考');
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

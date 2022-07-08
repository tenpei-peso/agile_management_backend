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
            $table->id();
            $table->foreignId('user_project_id')->references('id')->on('users_projects');
            $table->integer('order')->comment('同日に複数チケットを選択したときを順番で区別');
            $table->integer('ticketNumber')->comment('チケットNO');
            $table->datetime('startTime')->comment('開始時間');
            $table->datetime('endTime')->comment('終了時間');
            $table->datetime('breakTime')->comment('休憩時間');
            $table->integer('otherCost')->comment('経費');
            $table->string('costDetail')->comment('経費の備考');
            $table->integer('yearMonth')->comment('請求書一覧から詳細表示する際に簡単に絞り込むため');
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

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
            $table->foreignId('user_id')->constrained();
            $table->foreignId('project_id')->constrained();
            // $table->string('user_name')->comment('ユーザーの名前');
            // $table->string('project_name')->comment('プロジェクトの名前');
            $table->date('year_month')->comment('2022-06など');
            $table->integer('day')->comment('2など');
            $table->integer('ticket_number')->comment('APIから取得したチケット番号');
            $table->string('ticket_name')->comment('APIから取得したチケット名');
            $table->time('start_time')->comment('12:00など');
            $table->time('finish_time')->comment('12:00など');
            $table->time('rest_time')->comment('12:00など');
            $table->integer('working_time')->comment('1など');
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

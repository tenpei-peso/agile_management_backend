<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->date('yearMonth')->comment('請求書一覧から詳細表示する際に簡単に絞り込むため 2022-06');
            $table->integer('allCost')->comment('その月の合計請求額');
            $table->integer('allOperatingTime')->comment('その月の合計稼働時間');
            $table->integer('allOtherCost')->comment('その月の合計経費');
            $table->boolean('sendDone')->comment('送信済みかどうか');
            $table->string('remarks')->comment('備考・実装は後回しだがテーブルだけ作っておく');
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
        Schema::dropIfExists('bills');
    }
}

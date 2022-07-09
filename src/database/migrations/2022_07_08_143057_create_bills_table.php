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
            $table->foreignId('user_project_id')->references('id')->on('users_projects');
            $table->integer('yearMonth')->comment('請求書一覧から詳細表示する際に簡単に絞り込むため');
            $table->integer('allCost')->comment('その月の合計請求額');
            $table->integer('allOperatingTime')->comment('その月の合計稼働時間、分単位で保存？？');
            $table->integer('allOtherCost')->comment('その月の合計経費');
            $table->boolean('sendDone')->comment('送信済みかどうか');
            $table->string('remarks')->comment('備考？？');
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

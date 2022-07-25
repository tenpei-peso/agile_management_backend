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
            $table->foreignId('project_user_id')->references('id')->on('project_users');
            $table->foreignId('project_id')->constrained();
            $table->integer('year_month')->comment('請求書一覧から詳細表示する際に簡単に絞り込むため 202206');
            $table->integer('unit_price')->comment('単価');
            $table->integer('month_all_cost')->comment('その月の合計請求額');
            $table->integer('month_operating_time')->comment('その月の合計稼働時間,分単位で保存');
            $table->integer('month_other_cost')->comment('その月の合計経費');
            $table->boolean('send_done')->comment('送信済みかどうか');
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

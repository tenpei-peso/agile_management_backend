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
            $table->integer('order')->nullable()->comment('同じ日のデータが複数ある場合の区別');
            $table->foreignId('project_user_id')->nullable()->references('id')->on('project_users');
            $table->date('year_month_day')->nullable()->comment('2022-06-21など');
            $table->integer('ticket')->nullable()->comment('チケットNO');
            $table->time('start_time')->nullable()->comment('12:00など');
            $table->time('finish_time')->nullable()->comment('12:00など');
            $table->time('rest_time')->nullable()->comment('01:15など、15分単位で保存');
            $table->integer('working_time')->nullable()->comment('15分単位で保存');
            $table->integer('expense')->nullable()->comment('経費');
            $table->integer('unit_price')->nullable()->comment('単価');
            $table->string('remark')->nullable()->comment('備考');
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

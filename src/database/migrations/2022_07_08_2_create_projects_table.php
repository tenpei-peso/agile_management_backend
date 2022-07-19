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
            $table->string('name')->comment('プロジェクト名');
            // $table->integer('all_operating_time')->comment('現状の全ての工数');
            $table->integer('expected_all_operating_time')->comment('プロジェクト全体の予定工数');
            $table->date('product_deadline')->comment('納期');
            $table->integer('bill_deadline')->comment('請求書の締日');
            $table->string('remark')->comment('備考');
            // $table->integer('earning')->comment('売り上げ合計');
            // $table->integer('all_cost')->comment('当月にエンジニアに支払う金額合計');
            $table->date('contract_expired_date')->comment('プロジェクトの契約更新日');
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

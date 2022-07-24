<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('project_id')->constrained();
            $table->string('role')->comment('ポジション');
            $table->integer('expected_operating_time')->comment('プロジェクトにおける任意のエンジニアの予定工数');
            $table->integer('unit_price')->comment('単価');
            $table->integer('bill_send_date')->comment('請求書送付日');
            $table->string('contract_pdf_path')->comment('契約書のpath');
            $table->date('user_contract_date')->comment('前回の契約更新日/契約開始日');
            $table->date('user_expired_date')->comment('契約更新日/契約失効日');
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
        Schema::dropIfExists('project_users');
    }
}

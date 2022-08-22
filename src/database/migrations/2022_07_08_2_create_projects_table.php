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
            $table->foreignId('owner_id')->constrained()->onDelete('cascade');
            $table->string('project_name')->comment('プロジェクト名');
            $table->date('dead_line')->comment('納期');
            $table->integer('expected_all_operating_time')->comment('プロジェクト全体の予定工数');
            $table->date('contract_expired_date')->comment('プロジェクトの契約更新日');
            $table->string('remark')->nullable()->comment('課題');
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

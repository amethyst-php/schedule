<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(Config::get('amethyst.schedule.data.schedule.table'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->boolean('enabled')->default(1);
            $table->string('cron')->nullable();
            $table->text('data')->nullable();
            $table->integer('work_id')->unsigned()->nullable();
            $table->foreign('work_id')->references('id')->on(Config::get('amethyst.work.data.work.table'));
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists(Config::get('amethyst.schedule.data.schedule.table'));
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSharedTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::dropIfExists('shared_tasks');
        Schema::create('shared_tasks', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('taskId')->references('id')->on('tasks');
            // $table->foreignId('userId')->references('id')->on('users');
            $table->bigInteger('taskId')->index();
            $table->bigInteger('userId')->index();
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
        Schema::dropIfExists('shared_tasks');
    }
}

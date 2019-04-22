<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('task');
            $table->date('due_date');
            $table->boolean('repeats')->default(0);
            $table->integer('assigned_user_id');
            $table->integer('account_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('asset_id')->nullable();
            $table->integer('task_id')->nullable();
            $table->integer('task_type_id')->nullable();
            $table->integer('priority_id')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}

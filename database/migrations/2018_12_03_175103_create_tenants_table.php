<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('image_id')->nullable();
            $table->string('phone_1');
            $table->string('phone_2')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('co_first_name')->nullable();
            $table->string('co_last_name')->nullable();
            $table->string('co_phone_1')->nullable();
            $table->string('co_phone_2')->nullable();
            $table->string('co_email')->nullable();
            $table->string('street_1');
            $table->string('street_2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->integer('account_standing_id')->default(1);
            $table->integer('status_id')->default(1);
            $table->index(['first_name', 'last_name']);
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
        Schema::dropIfExists('tenants');
    }
}

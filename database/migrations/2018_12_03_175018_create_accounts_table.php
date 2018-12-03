<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('acct_num')->nullable();
            $table->string('url')->nullable();
            $table->string('street_1');
            $table->string('street_2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('phone_1');
            $table->string('phone_2')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_phone_1')->nullable();
            $table->string('contact_phone_2')->nullable();
            $table->string('contact_email')->nullable();
            $table->integer('account_type_id');
            $table->integer('company_id');
            $table->integer('asset_id');
            $table->integer('status_id');
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
        Schema::dropIfExists('accounts');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('street_1');
            $table->string('street_2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('phone_1');
            $table->string('phone_2')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('logo')->nullable();
            $table->date('incorp_date')->nullable();
            $table->string('corp_id')->nullable();
            $table->string('city_lic')->nullable();
            $table->string('county_lic')->nullable();
            $table->string('fed_tax_id')->nullable();
            $table->integer('company_type_id');
            $table->integer('status_id')->default(1);
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
        Schema::dropIfExists('companies');
    }
}

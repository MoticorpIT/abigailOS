<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('deposit_amount', 8, 2)->nullable();
            $table->decimal('rent_amount', 8, 2);
            $table->string('rent_due_date');
            $table->string('term_length')->nullable();
            $table->date('term_start');
            $table->string('term_ended')->nullable();
            $table->integer('tenant_id');
            $table->integer('asset_id');
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
        Schema::dropIfExists('contracts');
    }
}

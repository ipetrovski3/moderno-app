<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProformasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proformas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->delete('cascade');

            $table->integer('proforma_number')->default(0);
            $table->integer('without_vat')->default(0);
            $table->integer('vat')->default(0);
            $table->integer('total_price')->default(0);
            $table->date('date');
            $table->timestamps();
            $table->integer('uniqid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proformas');
    }
}

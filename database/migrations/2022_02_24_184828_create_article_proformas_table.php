<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleProformasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_proformas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proforma_id');
            $table->foreignId('product_id');
            $table->timestamps();
            $table->integer('qty');
            $table->float('single_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_proformas');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleCusinvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_cusinvoices', function (Blueprint $table) {
            $table->id();

            $table->foreignId('invoice_id')->delete('cascade');
            $table->foreignId('product_id');
            $table->float('single_price');
            $table->integer('qty');            
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
        Schema::dropIfExists('article_cusinvoices');
    }
}

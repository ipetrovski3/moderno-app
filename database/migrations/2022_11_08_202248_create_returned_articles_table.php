<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnedArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returned_articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('returned_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id');
            $table->integer('qty');
            $table->float('single_price');
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
        Schema::dropIfExists('returned_articles');
    }
}

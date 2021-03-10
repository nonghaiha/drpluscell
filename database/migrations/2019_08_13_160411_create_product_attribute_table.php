<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')
                  ->references('id')
                  ->on('product')
                  ->onDelete('cascade');
            $table->integer('attribute_id')->unsigned();;
            $table->foreign('attribute_id')
                  ->references('id')
                  ->on('attribute')
                  ->onDelete('cascade');
            $table->integer('quantity');
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
        Schema::dropIfExists('product_attribute');
    }
}

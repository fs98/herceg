<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 128)->nullable();
            $table->foreignId('category_id')
                  ->nullable()
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->string('slug')->nullable();
            $table->tinytext('ingredients')->nullable();
            $table->string('picture_file_name', 64)->nullable();
            $table->string('directory_id', 64)->nullable();
            $table->text('description')->nullable();
            $table->integer('price', false)->unsigned()->nullable();
            $table->string('measuring', 16)->nullable();
            $table->boolean('in_stock')->nullable();
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
        Schema::dropIfExists('products');
    }
}

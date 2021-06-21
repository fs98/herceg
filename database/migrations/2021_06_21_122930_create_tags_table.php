<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name', 16)->unique();
            $table->timestamps();
        });

        Schema::create('product_tag', function (Blueprint $table) {
          $table->id();
          $table->foreignId('product_id')
                ->unsigned()
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->odDelete('cascade');
          $table->foreignId('tag_id')
                ->unsigned()
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->odDelete('cascade');      
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
        Schema::dropIfExists('tags');
        Schema::dropIfExists('product_tag');
    }
}

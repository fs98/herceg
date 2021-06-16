<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 32)->nullable();
            $table->string('last_name', 32)->nullable();
            $table->string('email', 64)->nullable();
            $table->string('address', 128)->nullable();
            $table->string('city', 32)->nullable();
            $table->string('zip', 8)->nullable();
            $table->string('shipping_type', 32)->nullable();
            $table->date('from_date')->nullable();
            $table->date('until_date')->nullable();
            $table->text('message')->nullable();
            $table->string('receipt', 128)->nullable();
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
        Schema::dropIfExists('orders');
    }
}

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
            $table->string('customer', 255);
            $table->string('phone', 255);
            $table->timestamp('created_at', $precision = 0); // range
            $table->timestamp('completed_at', $precision = 0); // range +
            $table->unsignedBigInteger('user_id'); // fk // random
            $table->string('type');  // ? constraint content
            $table->string('status'); // ? constraint content

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
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

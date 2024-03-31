<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('starting_price', 10, 2);
            $table->decimal('current_bid', 10, 2)->nullable();
            $table->timestamp('auction_end_time');
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('winner_id')->nullable();
            $table->timestamps();

            //foreign key
            $table->foreign('seller_id')->references('id')->on('users');
            $table->foreign('winner_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};

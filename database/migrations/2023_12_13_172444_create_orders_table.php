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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('staff_id')->nullable();
			$table->json('tovars')->nullable(); // Изменение типа на JSON
        	$table->json('coupons')->nullable(); // Изменение типа на JSON
			$table->unsignedBigInteger('price');
			$table->string('status')->default('Ожидается');
            $table->timestamps();

			$table->index('user_id', 'user_id_idx');
			$table->foreign('user_id', 'user_id_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

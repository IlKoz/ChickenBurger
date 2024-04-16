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
        Schema::create('coupon_tovars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coupon_id');
            $table->unsignedBigInteger('tovar_id');
            $table->timestamps();

			$table->index('coupon_id', 'coupon_tovar_coupon_idx');
			$table->index('tovar_id', 'coupon_tovar_tovar_idx');

			$table->foreign('coupon_id', 'coupon_tovar_coupon_fk')->on('coupons')->references('id')->onDelete('cascade');
			$table->foreign('tovar_id', 'coupon_tovar_tovar_fk')->on('tovars')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_tovars');
    }
};

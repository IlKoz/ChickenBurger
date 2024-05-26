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
        Schema::create('restourants', function (Blueprint $table) {
            $table->id();
			$table->string('address');
			$table->string('phone');
			$table->string('working_time');
            $table->timestamps();
        });

		Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('restourant_id')->nullable();
			
			$table->foreign('restourant_id')->references('id')->on('restourants');
        });
		Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('restourant_id');
			
			$table->foreign('restourant_id')->references('id')->on('restourants');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restourants');
		Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['restourant_id']);
            $table->dropColumn('restourant_id');
        });
    }
};

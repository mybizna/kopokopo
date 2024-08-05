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
        Schema::create('kopokopo_withdraw', function (Blueprint $table) {
            $table->id();

            $table->string('amount');
            $table->string('currency');
            $table->string('callback');
            $table->string('destination_type')->nullable();
            $table->string('origination_time')->nullable();
            $table->string('destination_reference')->nullable();
            $table->string('transaction_reference')->nullable();
            $table->string('location')->nullable();
            $table->tinyInteger('faking')->nullable()->default(0);
            $table->tinyInteger('published')->nullable()->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kopokopo_withdraw');
    }
};

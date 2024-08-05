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
        Schema::create('kopokopo_transaction_customer', function (Blueprint $table) {
            $table->id();

            $table->string('trans_id');
            $table->string('passed_created_at');
            $table->string('event_type');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('phone_number');
            $table->string('link_self')->nullable();
            $table->string('link_resource')->nullable();
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
        Schema::dropIfExists('kopokopo_transaction_customer');
    }
};

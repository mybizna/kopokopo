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
        Schema::create('kopokopo_stkpush', function (Blueprint $table) {
            $table->id();

            $table->string('payment_channel')->default('M-PESA STK Push');
            $table->string('phone_number');
            $table->string('currency');
            $table->string('amount');
            $table->string('module');
            $table->string('model');
            $table->string('item_id');
            $table->string('till_number');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('callback')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('reference')->nullable();
            $table->string('notes')->nullable();
            $table->string('link_self')->nullable();
            $table->string('link_resource')->nullable();
            $table->string('location')->nullable();
            $table->text('result')->nullable();
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
        Schema::dropIfExists('kopokopo_stkpush');
    }
};

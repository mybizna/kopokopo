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
        Schema::create('kopokopo_recipient_paybill', function (Blueprint $table) {
            $table->id();

            $table->string('reference');
            $table->string('paybill_name');
            $table->string('paybill_number');
            $table->string('paybill_account_number');
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
        Schema::dropIfExists('kopokopo_recipient_paybill');
    }
};

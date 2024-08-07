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
        Schema::create('kopokopo_pay', function (Blueprint $table) {
            $table->id();

            $table->string('client_id');
            $table->string('destination_type');
            $table->string('destination_reference');
            $table->string('currency');
            $table->string('amount');
            $table->string('callback_url');
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->text('result')->nullable();
            $table->text('metadata')->nullable();
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
        Schema::dropIfExists('kopokopo_pay');
    }
};

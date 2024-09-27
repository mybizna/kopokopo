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
        Schema::create('kopokopo_transaction_reversal', function (Blueprint $table) {
            $table->id();

            $table->string('trans_id');
            $table->string('passed_created_at');
            $table->string('event_type');
            $table->string('resource_id');
            $table->string('status');
            $table->string('reference');
            $table->string('origination_time');
            $table->string('amount');
            $table->string('currency');
            $table->string('sending_till')->nullable();
            $table->string('sender_phone_number')->nullable();
            $table->string('till_number')->nullable();
            $table->string('system_str')->nullable();
            $table->string('sender_first_name')->nullable();
            $table->string('sender_middle_name')->nullable();
            $table->string('sender_last_name')->nullable();
            $table->string('link_self')->nullable();
            $table->string('link_resource')->nullable();
            $table->string('location')->nullable();
            $table->tinyInteger('faking')->nullable()->default(0);
            $table->tinyInteger('published')->nullable()->default(0);

            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->onDelete('set null');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kopokopo_transaction_reversal');
    }
};

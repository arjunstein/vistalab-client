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
        Schema::create('customers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('pms_id')->constrained('pms')->restrictOnDelete();
            $table->string('customer_name')->unique()->index();
            $table->string('os_server');
            $table->string('ip_server');
            $table->enum('server_type', ['cloud', 'on-premise'])->default('cloud');
            $table->text('interface_note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};

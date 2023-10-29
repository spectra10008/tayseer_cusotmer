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
        Schema::create('beneficiary_password_resets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beneficiary_id')->constrained(
                table: 'beneficiaries', indexName: 'beneficiaries_beneficiary_id'
            );
            $table->string('token');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiary_password_resets');
    }
};

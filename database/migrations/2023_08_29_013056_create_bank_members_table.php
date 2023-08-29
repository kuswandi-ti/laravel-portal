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
        Schema::create('bank_members', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->decimal('beginning_balance', 20, 2)->default(0);
            $table->string('bank_code')->nullable();
            $table->string('bank_name')->nullable();
            $table->enum('bank_type', ['cash', 'bank', 'other'])->nullable();
            $table->foreignUuid('area_id')->constrained('areas')->nullable();
            $table->boolean('status')->default(1)->comment('Active or Inactive Status');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('restored_at')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->string('restored_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_members');
    }
};

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
        Schema::create('expenses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('area_id')->constrained('areas')->nullable();
            $table->date('expense_date')->nullable();
            $table->decimal('expense_amount', 20, 2)->default(0)->nullable();
            $table->foreignUuid('expense_account_id')->constrained('accounts')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->enum('expense_status', ['pending', 'approve'])->default('pending')->nullable();
            $table->timestamp('approve_date')->nullable();
            $table->text('expense_notes')->nullable();
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
        Schema::dropIfExists('expenses');
    }
};

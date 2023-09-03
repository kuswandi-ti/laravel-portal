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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('transaction_type', ['income', 'expense']);
            $table->date('transaction_date')->nullable();
            $table->decimal('transaction_amount', 20, 2)->default(0)->nullable();
            $table->integer('for_month')->nullable()->comment('Specially for IPL');
            $table->integer('for_year')->nullable()->comment('Specially for IPL');
            $table->foreignUuid('account_id')->constrained('accounts')->nullable();
            $table->foreignUuid('area_id')->constrained('areas')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->enum('payment_status', ['not paid', 'paid', 'cancel'])->default('not paid');
            $table->date('payment_date')->nullable();
            $table->date('payment_time')->nullable();
            $table->enum('payment_type', ['cash', 'transfer']);
            $table->enum('payment_result', ['success', 'pending', 'cancel', 'refund'])->default('pending')->nullable();
            $table->timestamp('approve_date')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};

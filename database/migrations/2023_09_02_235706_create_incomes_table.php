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
        Schema::create('incomes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('area_id')->constrained('areas')->nullable();
            $table->date('income_date')->nullable();
            $table->decimal('income_amount', 20, 2)->default(0)->nullable();
            $table->foreignUuid('income_account_id')->constrained('accounts')->nullable();
            $table->integer('for_month')->nullable()->comment('Specially for IPL');
            $table->integer('for_year')->nullable()->comment('Specially for IPL');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->enum('income_status', ['not paid', 'paid', 'cancel'])->default('not paid');
            $table->timestamp('approve_date')->nullable();
            $table->string('payment_time')->nullable();
            $table->string('payment_type')->nullable()->comment('Cash, Transfer, or Other');
            $table->enum('payment_status', ['success', 'pending', 'cancel', 'refund'])->default('pending')->nullable();
            $table->text('income_notes')->nullable();
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
        Schema::dropIfExists('incomes');
    }
};

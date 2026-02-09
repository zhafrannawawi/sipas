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

        Schema::create('loans', function (Blueprint $table) {
            $table->id();

            // RELASI
            $table->foreignId('device_id')->constrained('devices')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // LOG & PETUGAS (Added index for faster searching in admin panels)
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('received_by')->nullable()->constrained('users')->nullOnDelete();

            // TANGGAL
            $table->date('loan_date');
            $table->date('due_date');
            $table->dateTime('returned_date')->nullable();

            // STATUS (Consider adding 'overdue')
            $table->enum('status', ['canceled', 'pending', 'borrowed', 'returned'])->default('pending');

            // KEUANGAN (Ensuring consistency with Devices table)
            $table->integer('price_per_day');
            $table->integer('total_price')->default(0);
            $table->integer('pay_price')->default(0);

            // DENDA
            $table->integer('total_fine')->default(0);
            $table->integer('pay_fine')->default(0);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};

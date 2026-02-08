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
            $table->foreignId('inventory_id')->constrained('inventories'); 
            $table->foreignId('user_id')->constrained('users'); 
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete(); 
            $table->foreignId('recieved_by')->nullable()->constrained('users')->nullOnDelete(); 
            $table->date('loan_date');
            $table->date('due_date');
            $table->date('returned_date')->nullable();
            $table->enum('status', ['pending', 'borrowed', 'returned'])->default('pending');
            $table->timestamps();
            $table->integer('deleted_at')->nullable(); // kalau mau pakai soft delete integer
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};

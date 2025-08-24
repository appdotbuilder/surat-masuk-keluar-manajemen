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
        Schema::create('dispositions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('incoming_mail_id');
            $table->unsignedBigInteger('from_employee_id');
            $table->unsignedBigInteger('to_employee_id');
            $table->enum('type', ['for_action', 'for_information', 'completed', 'archived'])->default('for_action');
            $table->text('instruction');
            $table->text('notes')->nullable();
            $table->enum('priority', ['low', 'normal', 'high', 'urgent'])->default('normal');
            $table->date('due_date')->nullable();
            $table->enum('status', ['pending', 'in_progress', 'completed', 'returned'])->default('pending');
            $table->timestamp('received_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->text('response')->nullable();
            $table->timestamps();
            
            $table->foreign('incoming_mail_id')->references('id')->on('incoming_mails')->onDelete('cascade');
            $table->foreign('from_employee_id')->references('id')->on('employees');
            $table->foreign('to_employee_id')->references('id')->on('employees');
            $table->index(['incoming_mail_id', 'status']);
            $table->index(['to_employee_id', 'status']);
            $table->index('due_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispositions');
    }
};
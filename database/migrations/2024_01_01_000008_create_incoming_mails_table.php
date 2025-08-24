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
        Schema::create('incoming_mails', function (Blueprint $table) {
            $table->id();
            $table->string('mail_number');
            $table->string('sender_number')->nullable();
            $table->date('mail_date');
            $table->date('received_date');
            $table->string('sender');
            $table->string('subject');
            $table->text('content')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('type_id');
            $table->string('attachment')->nullable();
            $table->enum('status', ['pending', 'processed', 'archived'])->default('pending');
            $table->unsignedBigInteger('received_by');
            $table->text('notes')->nullable();
            $table->timestamps();
            
            $table->foreign('category_id')->references('id')->on('mail_categories');
            $table->foreign('type_id')->references('id')->on('mail_types');
            $table->foreign('received_by')->references('id')->on('employees');
            $table->index(['status', 'received_date']);
            $table->index(['category_id', 'type_id']);
            $table->index('mail_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incoming_mails');
    }
};
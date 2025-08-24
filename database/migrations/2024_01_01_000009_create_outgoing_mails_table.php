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
        Schema::create('outgoing_mails', function (Blueprint $table) {
            $table->id();
            $table->string('mail_number')->unique();
            $table->date('mail_date');
            $table->string('recipient');
            $table->string('subject');
            $table->text('content')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('type_id');
            $table->string('attachment')->nullable();
            $table->enum('status', ['draft', 'sent', 'archived'])->default('draft');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->timestamp('sent_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            
            $table->foreign('category_id')->references('id')->on('mail_categories');
            $table->foreign('type_id')->references('id')->on('mail_types');
            $table->foreign('created_by')->references('id')->on('employees');
            $table->foreign('approved_by')->references('id')->on('employees');
            $table->index(['status', 'mail_date']);
            $table->index(['category_id', 'type_id']);
            $table->index('created_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outgoing_mails');
    }
};
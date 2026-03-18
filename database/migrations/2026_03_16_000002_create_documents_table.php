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
      Schema::create('documents', function (Blueprint $table) {
    $table->id();

    $table->foreignId('client_id')->nullable()->constrained()->nullOnDelete();
    $table->foreignId('case_id')->nullable()->constrained('case_files')->nullOnDelete();

    $table->string('document_type')->nullable();
    $table->date('upload_date')->nullable();
    $table->text('note')->nullable();
    $table->string('file')->nullable();
    $table->boolean('invoice')->nullable();
    $table->string('sender')->nullable();
    $table->string('receiver')->nullable();

    $table->timestamps();
    $table->softDeletes();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};

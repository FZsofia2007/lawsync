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
      Schema::create('deadlines', function (Blueprint $table) {
        $table->id();
    
        $table->foreignId('case_id')->nullable()->constrained('case_files')->nullOnDelete();
        $table->foreignId('client_id')->nullable()->constrained()->nullOnDelete();
    
        $table->date('date')->nullable();
        $table->time('time')->nullable();
        $table->text('description')->nullable();
        $table->string('location')->nullable();
    
        $table->timestamps();
        $table->softDeletes();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deadlines');
    }
};

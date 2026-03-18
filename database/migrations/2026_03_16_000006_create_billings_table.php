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
      Schema::create('billings', function (Blueprint $table) {
        $table->id();
    
        $table->text('template_text')->nullable();
    
        $table->foreignId('client_id')->nullable()->constrained()->nullOnDelete();
        $table->foreignId('case_id')->nullable()->constrained('case_files')->nullOnDelete();
    
        $table->string('month')->nullable();
    
        $table->timestamps();
        $table->softDeletes();
        
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billings');
    }
};

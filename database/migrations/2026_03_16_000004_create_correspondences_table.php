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
      Schema::create('correspondences', function (Blueprint $table) {
        $table->id();
    
        $table->foreignId('case_id')->nullable()->constrained('case_files')->nullOnDelete();
    
        $table->string('status')->nullable();
        $table->date('date')->nullable();
        $table->text('letter')->nullable();
    
        $table->timestamps();
        $table->softDeletes();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('correspondences');
    }
};

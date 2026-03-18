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
      Schema::create('case_files', function (Blueprint $table) {
        $table->id();
    
        $table->string('client_name')->nullable();
        $table->string('opposing_party')->nullable();
        $table->string('title')->nullable();
        $table->string('type')->nullable();
        $table->text('description')->nullable();
        $table->string('status')->nullable();
    
        $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
    
        $table->string('pricing')->nullable();
        $table->decimal('total_work_hours', 5, 2)->nullable();
        $table->date('deadline')->nullable();
        $table->string('notification')->nullable();
        $table->date('date')->nullable();
    
        $table->boolean('closed')->default(false);
        $table->decimal('elapsed_work_hours', 5, 2)->default(0);
    
        $table->dateTime('work_start')->nullable();
        $table->dateTime('work_end')->nullable();
    
        $table->timestamps();
        $table->softDeletes();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_files');
    }
};

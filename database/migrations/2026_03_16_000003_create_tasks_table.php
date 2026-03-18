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
      Schema::create('tasks', function (Blueprint $table) {
        $table->id();
    
        $table->foreignId('case_id')->nullable()->constrained('case_files')->nullOnDelete();
    
        $table->date('deadline')->nullable();
        $table->text('task')->nullable();
        $table->string('attachment')->nullable();
        $table->string('sender_name')->nullable();
        $table->string('receiver_name')->nullable();
        $table->decimal('work_hours', 5, 2)->default(0);
        $table->boolean('completed')->default(false);
    
        $table->timestamps();
        $table->softDeletes();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};

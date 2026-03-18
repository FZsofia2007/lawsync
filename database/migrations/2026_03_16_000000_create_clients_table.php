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
      Schema::create('clients', function (Blueprint $table) {
        $table->id();
    
        $table->string('name')->nullable();
        $table->date('birth_date')->nullable();
        $table->string('birth_place')->nullable();
        $table->string('mother_name')->nullable();
        $table->string('id_number')->nullable();
        $table->string('address')->nullable();
        $table->string('phone')->nullable();
        $table->string('email')->nullable();
        $table->string('tax_number')->nullable();
        $table->string('company_registration')->nullable();
    
        $table->timestamps();
        $table->softDeletes();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};

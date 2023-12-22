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
        {
            Schema::create('data_table_images', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->foreignId('dynamic_data_table_id')->constrained()->onDelete('cascade');
                $table->string('caption')->nullable();
                $table->timestamps();
            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_table_images');
    }
};

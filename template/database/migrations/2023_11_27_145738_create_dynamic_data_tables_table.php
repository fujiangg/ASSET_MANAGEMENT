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
        Schema::create('dynamic_data_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item')->constrained('item_names');
            $table->unsignedBigInteger('manufacturer')->constrained('manufacturer_names');
            $table->string('serial_number', 50)->nullable();
            $table->unsignedBigInteger('configuration_status')->constrained('configuration_status_names');
            $table->unsignedBigInteger('location')->constrained('location_names');
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('position_status')->constrained('position_status_names');
            $table->timestamp('created_date')->useCurrent();
            $table->timestamp('updated_date')->useCurrent()->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dynamic_data_tables');
    }
};

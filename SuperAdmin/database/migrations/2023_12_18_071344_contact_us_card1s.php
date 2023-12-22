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
        Schema::create('contact_us_card1s', function (Blueprint $table) {
            $table->id();
            $table->string('cardtitle');
            $table->string('carddescription');
            $table->string('day');
            $table->string('time');
            $table->string('phonenumber');
            $table->string('emailaddress');
            $table->string('locationaddress');
            $table->string('facebooklink');
            $table->string('twitterlink');
            $table->string('instagramlink');
            $table->string('linkedinlink');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

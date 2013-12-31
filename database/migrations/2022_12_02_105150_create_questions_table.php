<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer('image_id');
            $table->boolean('required');
            $table->string('response_type');
            $table->json('check_conditions_for');
            $table->json('categories');
            $table->boolean('negative');
            $table->boolean('notes_allowed');
            $table->boolean('photos_allowed');
            $table->boolean('issues_allowed');
            $table->boolean('responded');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};

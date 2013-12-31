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
        Schema::create('form_items', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('forms_id')->constrained('forms')->cascadeOnDelete();
            $table->foreignId('parent_id')->nullable()->constrained('form_items')->cascadeOnDelete();
            $table->integer('item_id')->index();
            $table->integer('item_type')->index();
            $table->string('title');
            $table->json('params');
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
        Schema::dropIfExists('form_items');
    }
};

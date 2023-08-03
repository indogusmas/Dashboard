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
        Schema::create('menu_list', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('icon')->nullable();
            $table->string('link')->nullable();
            $table->bigInteger('parent_id')->nullable()->unsigned();
            $table->integer('level')->nullable();
            $table->integer('sequence');
            $table->integer('status_id')->default(1);
            $table->timestamps();
            $table->foreign('parent_id')->nullable()->references('id')->on('menu_list')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_list');
    }
};

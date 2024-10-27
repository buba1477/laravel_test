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
        Schema::create('people_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_people');
            $table->foreign('id_people')->references('id')->on('people');
            $table->string('file_name');
            $table->string('file_path');
            $table->timestamps();
            $table->softDeletes();

            $table->index('id_people', 'post_people_files_idx');
            $table->foreign('id_people', 'post_people_files_fk')->references('id')->on('people')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people_files');
    }
};

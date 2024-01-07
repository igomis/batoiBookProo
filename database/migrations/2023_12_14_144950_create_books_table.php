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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('module_id', 12);
            $table->foreign('module_id')->references('code')->on('modules');
            $table->string('publisher', 50);
            $table->decimal('price', 10, 0)->default(0);
            $table->smallInteger('pages')->nullable();
            $table->enum('status', ['new', 'good', 'used', 'bad'])->default('good');
            $table->string('photo', 200);
            $table->text('comments')->nullable();
            $table->date('soldDate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

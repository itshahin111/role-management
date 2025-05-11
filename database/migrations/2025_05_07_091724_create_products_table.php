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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // one to one relationship with users
            // $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key column
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->string('image')->nullable();
            $table->integer('quantity');
            $table->timestamps();
            // Define the foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

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
        Schema::create('teens', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("last_name");
            $table->string("identification");
            $table->date("birthdate")->nullable();
            $table->text("address");
            $table->string("nationality");
            $table->string("scholarship")->nullable();
            $table->integer('level')->nullable();
            $table->foreignId('contact_id')->nullable()->constrained("contacts")->onDelete(null);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teens');
    }
};

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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->date('birthday');
            $table->boolean('gender');
            $table->unsignedBigInteger('salon_id')->index();
            $table->foreign('salon')->references('id')->on('salons')->cascadeOnDelete();
            $table->unsignedBigInteger('membership_id')->index();
            $table->foreign('membership')->references('id')->on('memberships')->cascadeOnDelete();
            $table->unsignedBigInteger('coach_id')->index();
            $table->foreign('coach_id')->references('id')->on('coaches')->cascadeOnDelete();
            $table->unsignedBigInteger('days_id')->index()->nullable();
            $table->foreign('days_id')->references('id')->on('days')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};

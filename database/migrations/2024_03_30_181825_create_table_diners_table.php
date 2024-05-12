<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_diners', function (Blueprint $table) {
            $table->id();
            $table->string('client');
            $table->string('telephone');
            $table->string('email');
            $table->string('person_quantity');
            $table->date('date_rdv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_diners');
    }
};

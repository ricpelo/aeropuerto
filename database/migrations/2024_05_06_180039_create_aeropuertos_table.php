<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('aeropuertos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 3)->unique();
            $table->string('nombre');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE aeropuertos
                        ADD CONSTRAINT ck_codigo_letras
                        CHECK (codigo SIMILAR TO '%[A-Z]{3}%')");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aeropuertos');
    }
};

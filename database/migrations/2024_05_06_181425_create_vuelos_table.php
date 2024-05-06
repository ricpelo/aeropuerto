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
        Schema::create('vuelos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 6)->unique();
            $table->foreignId('origen_id')->constrained('aeropuertos');
            $table->foreignId('destino_id')->constrained('aeropuertos');
            $table->foreignId('compania_id')->constrained();
            $table->timestamp('salida');
            $table->timestamp('llegada');
            $table->integer('plazas');
            $table->decimal('precio', 6, 2);
            $table->timestamps();
        });

        DB::statement("ALTER TABLE vuelos
                ADD CONSTRAINT ck_codigo_valido
                CHECK (codigo SIMILAR TO '%[A-Z]{2}[0-9]{4}%')");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vuelos');
    }
};

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
        Schema::create('reports', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('date');
            $table->uuidMorphs('related');
            $table->foreignUuid('user_id');
            $table->timestamps();
        });

        Schema::create('reports_atendimento_recepcao', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('via');
            $table->string('author_name');
            $table->string('author_contact');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('reports_solicitacao_recepcao', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('status');
            $table->string('author_name');
            $table->string('author_contact');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};

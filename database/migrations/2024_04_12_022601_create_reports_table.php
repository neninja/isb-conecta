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
            $table->foreignUuid('team_id');
            $table->timestamps();
        });

        Schema::create('reports_atendimento', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('via');
            $table->string('author_name');
            $table->string('author_contact');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('reports_solicitacao', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('status');
            $table->string('author_name');
            $table->string('author_contact');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('reports_telefonema', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('author_name');
            $table->string('author_contact');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('reports_observacao', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('subject');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('reports_ocorrencia', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type');
            $table->string('subject');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('reports_documentacao', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('status');
            $table->string('subject');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('reports_tarefa', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('requested');
            $table->string('subject');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('reports_reuniao', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('subject');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('reports_caso-encaminhado', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('tech_name');
            $table->string('tech_contact');
            $table->string('forwarded_location');
            $table->timestamps();
        });

        Schema::create('reports_acompanhamento', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('subject');
            $table->string('network');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('reports_doacao', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('donator');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('reports_documento-emitido', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('subject');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('reports_valor', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('amount');
            $table->string('sponsor');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('reports_sec', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('amount');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('reports_gasto-extra', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('amount');
            $table->string('subject');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('reports_comunicado', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('subject');
            $table->string('family_feedback');
            $table->timestamps();
        });

        Schema::create('reports_atividade', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('subject');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('reports_material-solicitado', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('subject');
            $table->json('items');
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

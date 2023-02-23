<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ponderation_cour_id')->constrained('ponderation_cour');
            $table->foreignId('eleve_id')->constrained('eleves');
            $table->string('cote');
            $table->string('pourcentage');
            $table->boolean('etat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotes');
    }
}

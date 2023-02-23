<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePonderationCourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ponderation_cour', function (Blueprint $table) {
            $table->id();
            $table->string('maximum');
            $table->foreignId('cour_id')->constrained('cours');
            $table->foreignId('periode_id')->constrained('periodes');
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
        Schema::dropIfExists('ponderation_cour');
    }
}

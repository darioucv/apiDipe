<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListSymptomByDiseasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_symptom_by_diseases', function (Blueprint $table) {
            $table->unsignedInteger('disease_id2');
            $table->unsignedInteger('symptom_id');
            $table->foreign('disease_id2')->references('disease_id')->on('diseases');
            $table->foreign('symptom_id')->references('symptom_id')->on('symptoms');
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
        Schema::dropIfExists('list_symptom_by_diseases');
    }
}

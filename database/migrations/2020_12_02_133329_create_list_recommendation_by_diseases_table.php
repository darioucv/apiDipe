<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListRecommendationByDiseasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_recommendation_by_diseases', function (Blueprint $table) {
            $table->unsignedInteger('disease_id3');
            $table->unsignedInteger('recommendation_id');
            $table->foreign('disease_id3')->references('id')->on('diseases');
            $table->foreign('recommendation_id')->references('id')->on('recommendations');
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
        Schema::dropIfExists('list_recommendation_by_diseases');
    }
}

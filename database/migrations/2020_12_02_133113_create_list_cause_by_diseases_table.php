<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListCauseByDiseasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_cause_by_diseases', function (Blueprint $table) {
            $table->unsignedInteger('disease_id1');
            $table->unsignedInteger('cause_id');
            $table->foreign('disease_id1')->references('disease_id')->on('diseases');
            $table->foreign('cause_id')->references('cause_id')->on('causes');
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
        Schema::dropIfExists('list_cause_by_diseases');
    }
}

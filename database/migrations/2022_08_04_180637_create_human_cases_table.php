<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHumanCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('human_cases', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('work');
            $table->string('phone');
            $table->string('address');
            $table->string('situation');
            $table->text('Explanation_of_the_situation');
            $table->string('The_amount_required');
            $table->string('image');
           
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
        Schema::dropIfExists('human_cases');
    }
}

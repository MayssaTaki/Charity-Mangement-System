<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_requests', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Are_you_already_registered');
            $table->integer('number_of_family_member');
            $table->string('study');
            $table->integer('phone');
            $table->string('address');
            $table->string('campaign');
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
        Schema::dropIfExists('campaign_requests');
    }
}

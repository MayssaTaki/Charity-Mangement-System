<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donor_campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->integer('campaign_id');
            $table->string('email');
            $table->string('ID_number')->unique();
            $table->string('company_Bank');
            $table->string('donation_value');
              $table->string('phone');
            $table->string('image');
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('donor_campaigns');
    }
}

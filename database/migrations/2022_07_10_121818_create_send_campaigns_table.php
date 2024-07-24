<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(area::class)->constrained('areas')->onDelete('cascade');
            $table->foreignIdFor(campaign::class)->constrained('campaigns')->onDelete('cascade');
            $table->string("Date_first");
            $table->string("Date_End");

            $table->string("Timer");
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
        Schema::dropIfExists('send_campaigns');
    }
}

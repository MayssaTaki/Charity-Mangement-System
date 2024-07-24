<?php

use App\Models\campaign;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCachPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cach_payments', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('address');
            $table->string('phone');
            $table->string('Amount');
            $table->foreignIdFor(campaign::class)->constrained('campaigns')->onDelete('cascade');
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
        Schema::dropIfExists('cach_payments');
    }
}

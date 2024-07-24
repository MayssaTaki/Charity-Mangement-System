<?php

use App\Models\role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteer1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteer1s', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("study");
            $table->string("phone");
            $table->string("previous_experience");
            $table->string("address");
            $table->string("email");
            
            $table->foreignIdFor(role::class)->constrained('roles')->onDelete('cascade');      
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
        Schema::dropIfExists('volunteer1s');
    }
}

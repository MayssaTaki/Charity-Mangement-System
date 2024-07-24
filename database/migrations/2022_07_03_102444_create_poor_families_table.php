<?php

use App\Models\area;
use App\Models\campaign;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoorFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poor_families', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("work");
            $table->foreignIdFor(area::class)->constrained('areas')->onDelete('cascade');
            $table->foreignIdFor(campaign::class)->constrained('campaigns')->onDelete('cascade');
            $table->integer("number_of_family_member");
			$table->string("phone");
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
        Schema::dropIfExists('poor_families');
    }
}

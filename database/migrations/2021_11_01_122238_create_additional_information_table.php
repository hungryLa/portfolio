<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('slug')->unique(); // Берем логин
            $table->enum('gender',['Choose a gender','man','woman'])->default('Choose a gender');
            $table->unsignedInteger("height")->default(0);
            $table->string("parameters",15)->nullable()->default(null);
            $table->string('instagram_link')->nullable()->default(null);
            $table->text("about_you")->nullable();
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
        Schema::dropIfExists('additional_information');
    }
}

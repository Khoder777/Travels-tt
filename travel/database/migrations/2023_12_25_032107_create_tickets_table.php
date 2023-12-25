<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->date('date_e');
            $table->date('date_s');
            $table->unsignedBigInteger("company_id");
            $table->foreign("company_id")->references("id")->on("companies")->cascadeOnDelete();
            $table->unsignedBigInteger("city_id");
            $table->foreign("city_id")->references("id")->on("cities")->cascadeOnDelete();
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
        Schema::dropIfExists('tickets');
    }
};

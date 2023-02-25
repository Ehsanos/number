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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->double('profit_rate');
            $table->string('api_key')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('facebook')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('name')->nullable();
            $table->string('logo')->nullable();


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
        Schema::dropIfExists('settings');
    }
};

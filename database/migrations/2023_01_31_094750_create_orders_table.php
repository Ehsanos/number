<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\OrderStatusEnum;
return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained();
            $table->enum('status',[OrderStatusEnum::Wait->value,OrderStatusEnum::Success->value,OrderStatusEnum::Cancelled->value])->nullable();
            $table->double('price')->nullable()->default(0);
            $table->text('info')->nullable();
            $table->string('api_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('code')->nullable();



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
        Schema::dropIfExists('orders');
    }
};

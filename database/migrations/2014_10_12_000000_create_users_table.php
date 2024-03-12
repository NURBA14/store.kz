<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->tinyInteger("is_admin")->default(0);
            $table->tinyInteger("is_deliveryman")->default(0);
            $table->tinyInteger("active")->default(1);

            $table->string("avatar")->nullable();
            $table->string("bank_cart")->nullable();
            $table->string("cvv")->nullable();
            $table->string("bank_cart_age")->nullable();
            $table->string("phone_number")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};

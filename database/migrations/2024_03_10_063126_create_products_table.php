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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("slug")->unique();
            $table->string("name");
            $table->text("description");
            $table->integer("old_price")->nullable();
            $table->integer("price");
            $table->integer("count");
            $table->integer("category_id");
            $table->tinyInteger("active")->default(1);
            $table->string("img_1")->nullable();
            $table->string("img_2")->nullable();
            $table->string("img_3")->nullable();
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
        Schema::dropIfExists('products');
    }
};

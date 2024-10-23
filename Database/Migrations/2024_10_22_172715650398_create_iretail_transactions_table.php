<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('iretail__transactions', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      // Your fields...
      $table->integer('quantity')->default(0)->unsigned();
      $table->tinyInteger('type_id');
      $table->integer('item_id')->unsigned()->nullable();
      $table->foreign('item_id')->references('id')->on('iretail__items')->onDelete('cascade');
      $table->integer('price')->default(0)->unsigned();
      $table->integer('total')->default(0)->unsigned();
      $table->text('comment')->nullable();
      // Audit fields
      $table->timestamps();
      $table->auditStamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('iretail__transactions');
  }
};

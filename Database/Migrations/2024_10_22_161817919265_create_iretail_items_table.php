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
    Schema::create('iretail__items', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      // Your fields...
      $table->double('purchase_price', 30, 2)->default(0);
      $table->double('sale_price', 30, 2)->default(0);
      $table->integer('quantity')->default(0)->unsigned();
      $table->tinyInteger('status')->default(1)->unsigned();
      $table->text('options')->nullable();
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
    Schema::dropIfExists('iretail__items');
  }
};

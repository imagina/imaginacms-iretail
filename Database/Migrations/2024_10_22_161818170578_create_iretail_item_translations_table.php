<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIretailItemTranslationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('iretail__item_translations', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      // Your translatable fields
      $table->text('title');
      $table->integer('item_id')->unsigned();
      $table->string('locale')->index();
      $table->unique(['item_id', 'locale']);
      $table->foreign('item_id')->references('id')->on('iretail__items')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('iretail__item_translations', function (Blueprint $table) {
      $table->dropForeign(['item_id']);
    });
    Schema::dropIfExists('iretail__item_translations');
  }
}

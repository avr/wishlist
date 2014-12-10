<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatingItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function(Blueprint $table)
		{
			$table->increments('id');
      $table->char('name');
      $table->text('description')->nullable();
      $table->enum('access', ['public', 'private'])->default('private');
      $table->char('comment')->nullable();
      $table->text('image_url')->nullable();
      $table->text('item_url')->nullable();

      $table->integer('quantity')->default(1)->unsigned();
      $table->boolean('fulfilled')->default(0);

			$table->timestamps();

      $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('items');
	}

}

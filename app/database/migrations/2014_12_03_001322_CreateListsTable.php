<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lists', function(Blueprint $table)
		{
			$table->increments('id');
      $table->string('list_name')->required();
      $table->integer('user_id')->unsigned();
      $table->datetime('expires')->default(NULL)->nullable();
      $table->enum('access', ['public', 'private'])->default('private');
			
      $table->timestamps();
      
      $table->softDeletes();      
		});

    Schema::table('items', function(Blueprint $table) {
      $table->integer('list_id')->unsigned()->after('id');
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lists');

    Schema::table('items', function(Blueprint $table) {
      $table->dropColumn('list_id');
    });
	}

}













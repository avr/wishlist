<?php

class Item extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'items';

  protected $fillable = [
    'list_id',
    'name',
    'image_url',
    'item_url',
    'description'
  ];

  public $rules = [
    'name' => 'required',
    'image_url' => 'url',
    'item_url' => 'url'
  ];

  public $errors;

  public function wishlist() {
    return $this->belongsTo('WishList', 'list_id', 'id');
  }

  public function validForCreation($input) {
    
    $validation = Validator::make($input, $this->rules);

    if ($validation->passes()) return true;

    $this->errors = $validation->messages();

    return false;
  
  }
}

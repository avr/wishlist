<?php

class WishList extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'wishlists';

  protected $fillable = [
    'list_name',
    'user_id',
    'expires',
    'access'
  ];

  public $rules = [
  ];

  public $errors;

  public $with = [
    'items'
  ];

  public function items() {
    return $this->hasMany('Item', 'list_id');
  }

  public function validForCreation($input) {
    
    $validation = Validator::make($input, $this->rules);

    if ($validation->passes()) return true;

    $this->errors = $validation->messages();

    return false;
  }

  public function validForUpdate($input) {
    
    $validation = Validator::make($input, $this->rules);

    if ($validation->passes()) return true;

    $this->errors = $validation->messages();

    return false;
  }

}

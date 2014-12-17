<?php

class ListController extends \BaseController {

  protected $list;

  public function __construct(WishList $list) {
    $this->list = $list;
  }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

    $lists = WishList::all();

    if ( Request::ajax() ) {
      return $lists;
    }

		return View::make('lists.index', compact('lists'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

    if ($list = WishList::find($id)) {    
      return View::make('lists.detail', compact('list'));
    }    
    
    return Redirect::route('lists.index')->withErrors('The Wish List was not found.');    
    
	}	


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->showForm('create');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return $this->showForm('edit', $id);
	}

  /**
   * Shows the form.
   *
   * @param  string  $mode
   * @param  int  $id
   * @return mixed
   */
  protected function showForm($mode, $id = null)
  {
      if ( ! $list = WishList::findOrNew($id))
      {
          return Redirect::to('list.index')->withErrors('That list could not be found');
      }

      return View::make('lists.form', compact('list', 'mode'));
  }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$data = Input::all();

    if ( ! $this->list->validForCreation($data)) {

      // Redirect back with errors
      return Redirect::back()->withInput()->withErrors($this->list->errors);

    }
    
    // If list is created, show the listing page with a success message
    if ($list = WishList::create($data)) {
      
      return Redirect::route('lists.index')->withSuccess('The Wish List was successfully created');
    
    }
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Save the list
		$data = Input::all();

    if ( ! $this->list->validForUpdate($data)) {
  		return Redirect::back()->withInput()->withErrors($this->list->errors);
    }    

    // If success: show index page with success message
    if (WishList::updateOrCreate(['id' => $id], $data )) {
      return Redirect::route('lists.index')->withSuccess('The WishList was successfully updated');
    }

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// Delete the list
		// If success: show index page with success message
		// If error: show edit page with error message
	}


}

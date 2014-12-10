<?php

class ItemController extends \BaseController {

  protected $item;

  public function __construct(Item $item) {
    $this->item = $item;
  }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($list_id)
	{

    $items = Item::whereListId($list_id)->get();

    $wishlist = WishList::find($list_id);

    return View::make('items.index', compact('wishlist','items'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($item)
	{
		return View::make('items.detail', compact('item'));
	}	


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($list_id)
	{
		return $this->showForm('create', $list_id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($list_id, $id)
	{
		return $this->showForm('edit', $list_id, $id);
	}

  /**
   * Shows the form.
   *
   * @param  string  $mode
   * @param  int  $id
   * @return mixed
   */
  protected function showForm($mode, $list_id, $id = null)
  {
      if ( ! $item = Item::findOrNew($id))
      {
          return Redirect::to('item.index')->withErrors('That item could not be found');
      }

      return View::make('items.form', compact('item', 'list_id', 'mode'));
  }

  /**
   * Processes the form.
   *
   * @param  string  $mode
   * @param  int  $id
   * @return \Illuminate\Http\RedirectResponse
   */
  protected function processForm($mode, $id = null)
  {
      // Store the reference
      list($errors, $reference) = $this->references->store($id, request()->all());

      // Do we have any errors?
      if ($errors->isEmpty())
      {
          return redirect()->toAdmin("references/{$reference->id}")->withSuccess(
              trans("embassy/references::message.success.{$mode}")
          );
      }

      // Redirect to the previous page
      return redirect()->back()->withInput()->withErrors($errors);
  }


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$data = Input::all();

    if ( ! $this->item->validForCreation($data)) {

      // Redirect back with errors
      return Redirect::back()->withInput()->withErrors($this->item->errors);

    }
    
    // If item is created, show the listing page with a success message
    if ($item = Item::create($data)) {
      
      return Redirect::route('lists.items.index', $item->list_id)->withSuccess('The Item was successfully created');
    
    }


	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($list_id, $item_id)
	{
		// Save the item
		$data = Input::all();

    if ( ! $this->item->validForCreation($data)) {
  		return Redirect::back()->withInput()->withErrors($this->item->errors);
    }    

    // If success: show index page with success message
    if (Item::updateOrCreate(['id' => $item_id], $data )) {
      return Redirect::route('lists.items.index', [$list_id])->withSuccess('The Item was successfully updated');
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
		// Delete the item
		// If success: show index page with success message
		// If error: show edit page with error message
	}


}

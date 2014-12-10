@extends('layouts.master')


@section('content')

  <h1>{{ Str::title($mode) }}</h1>

  <div class="row">
    {{ Former::populate($item) }}
    @if ($mode === 'create')
      {{ Former::open()->route('lists.items.store') }}
    @else
      {{ Former::open()->method('PUT')->route('lists.items.update', [$list_id, $item->id]) }}
    @endif

      {{ Form::hidden('list_id', $list_id) }}

      <div class="col-lg-12">

        {{ Former::text('name')->help('Enter the item name') }}

      </div>

      <div class="col-lg-6">

        {{ Former::text('image_url')->label('Image URL')->help('Enter a link to an image of the item') }}

      </div>
      
      <div class="col-lg-6">
        
        {{ Former::text('item_url')->label('Item URL')->help('Enter a shopping link to the item') }}
      
      </div>

      <div class="col-lg-12">

        {{ Former::textarea('description')->help('Enter the item description') }}

      </div>
    
      {{-- Form actions --}}
      <div class="form-group">

        <div class="col-lg-12 text-right">

        {{ Form::submit(($mode === 'edit') ? 'Save' : 'Create', ['class' => 'btn btn-success']) }}

        </div>

      </div>

    {{ Former::close() }}
    
  </div>
@stop
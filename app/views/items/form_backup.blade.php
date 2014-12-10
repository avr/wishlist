@extends('layouts.master')


@section('content')

<div class="container">
  
  <h1>{{ Str::title($mode) }}</h1>

  <div class="row">
    @if ($mode === 'create')
      {{ Form::model($item, ['route' => 'items.index']) }}
    @else
      {{ Form::model($item, ['method' => 'PUT', 'route' => ['items.update', $item->id]]) }}
    @endif

      <div class="col-lg-12">

        <div class="form-group{{ $errors->first('name', ' has-error') }}">
          <label for="name" class="control-label">Item Name</label>
          {{ Form::text('name', $item->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}
          <span class="help-block">
            {{ $errors->first('name', ':message') ?: 'Enter the item name' }}
          </span>        
        </div>

      </div>

      <div class="col-lg-6">
        <div class="form-group{{ $errors->first('image_url', ' has-error') }}">
          <label for="image_url" class="control-label">Item URL</label>
          {{ Form::text('image_url', $item->image_url, ['class' => 'form-control', 'placeholder' => 'Image URL']) }}
          <span class="help-block">
            {{ $errors->first('image_url', ':message') ?: "Enter a link to an image of the item" }}
          </span>        
        </div>
      </div>
      
      <div class="col-lg-6">
        <div class="form-group{{ $errors->first('item_url', ' has-error') }}">
          <label for="item_url" class="control-label">Item URL</label>
          {{ Form::text('item_url', $item->item_url, ['class' => 'form-control', 'placeholder' => 'Item URL']) }}
          <span class="help-block">
            {{ $errors->first('item_url', ':message') ?: 'Enter the item url' }}
          </span>        
        </div>
      </div>

      <div class="col-lg-12">
        <div class="form-group{{ $errors->first('description', ' has-error') }}">
          <label for="description" class="control-label">Description</label>
          {{ Form::textarea('description', $item->description, ['class' => 'form-control', 'placeholder' => 'description']) }}
          <span class="help-block">
            {{ $errors->first('description', ':message') ?: 'Enter the item description' }}
          </span>        
        </div>
      </div>
    
      {{-- Form actions --}}
      <div class="form-group">

        <div class="col-lg-12 text-right">

        {{ Form::submit(($mode === 'edit') ? 'Save' : 'Create', ['class' => 'btn btn-success']) }}

        </div>

      </div>

    {{ Form::close() }}
    
  </div>
  
  
</div>



@stop
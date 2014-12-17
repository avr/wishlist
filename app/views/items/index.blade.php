@extends('layouts.master')

@section('content')

  <h2>{{ $wishlist->list_name }}</h2>
  {{ HTML::linkRoute('lists.items.create', 'Add Item', [$wishlist->id], ['class' => 'btn btn-primary btn-sm']) }}


<div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Item Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($items as $item)

          <tr>
            <td>{{ $item->name }}</td>
            <td>{{ HTML::linkRoute('lists.items.edit', 'Edit', [$item->wishlist->id, $item->id], ['class' => 'btn btn-primary btn-sm']) }}</td>
          </tr>

        @endforeach
        
        </tbody>

      </table>
</div>

@stop
@extends('layouts.master')

@section('content')

  <h2>{{ $items->last()->wishlist->list_name }}</h2>

<div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Item Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($items as $item)

          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ HTML::linkRoute('lists.items.edit', 'Edit', [$item->wishlist->id, $item->id], ['class' => 'btn btn-primary btn-sm']) }}</td>
          </tr>

        @endforeach
        </tbody>

      </table>
</div>

@stop
@extends('layouts.master')

@section('content')

{{ HTML::linkRoute('lists.create', 'Add new List', null, ['class' => 'btn btn-primary btn-sm']) }}

<div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>List Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($lists as $list)

          <tr>
            <td>{{ $list->id }}</td>
            <td>{{ $list->list_name }}</td>
            <td>
              {{ HTML::linkRoute('lists.show', 'View', [$list->id], ['class' => 'btn btn-primary btn-sm']) }}
              {{ HTML::linkRoute('lists.items.create', 'Add Item', [$list->id], ['class' => 'btn btn-primary btn-sm']) }}
              {{ HTML::linkRoute('lists.edit', 'Edit', [$list->id], ['class' => 'btn btn-primary btn-sm']) }}

            </td>
          </tr>

        @endforeach
        </tbody>

      </table>
</div>

@stop
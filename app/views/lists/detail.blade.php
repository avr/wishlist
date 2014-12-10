@extends("layouts.master")

@section('content')

    <h1>{{{ $list->list_name or 'Missing' }}}</h1>

    {{ HTML::linkRoute('lists.edit', 'Edit this list', [$list->id], ['class' => 'btn btn-primary btn-sm']) }}

    {{ HTML::linkRoute('lists.items.create', 'Add item', [$list->id], ['class' => 'btn btn-primary btn-sm']) }}


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

        @foreach ($list->items as $item)

          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ HTML::linkRoute('lists.items.edit', 'Edit', [$list->id, $item->id], ['class' => 'btn btn-primary btn-sm']) }}</td>
          </tr>

        @endforeach
        </tbody>

      </table>
    </div>


@stop
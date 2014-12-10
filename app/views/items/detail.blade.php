@extends("layouts.master")

@section('content')

  <div class="container">

    <h1>{{{ $item->name or 'Missing' }}}</h1>

    {{ HTML::linkRoute('items.edit', 'Edit this item', [$item->id]) }}

  </div>

@stop
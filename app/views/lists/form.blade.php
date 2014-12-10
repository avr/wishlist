@extends('layouts.master')


@section('content')

  <h1>{{ Str::title($mode) }}</h1>

  <div class="row">
    {{ Former::populate($list) }}
    @if ($mode === 'create')
      {{ Former::open()->route('lists.store') }}
    @else
      {{ Former::open()->method('PUT')->route('lists.update', [$list->id]) }}
    @endif

      <div class="col-lg-12">

        {{ Former::text('list_name')->help('Enter the list name') }}

      </div>

      <div class="col-lg-12">

        {{ Former::textarea('description')->help('Enter the list description') }}

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
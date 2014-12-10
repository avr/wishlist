@if ($errors->any())

  <div class="alert alert-danger alert-block">

    <button type="button" class="close" data-dismiss="alert"><i class="fa fa-minus-square"></i></button>

    <strong>Whoops!</strong>

    @if ($message = $errors->first(0, ':message'))
      {{ $message }}
    @else
      Please check the form below for errors
    @endif

  </div>

@endif

@if ($message = Session::get('success'))

  <div class="alert alert-success alert-block">

    <button type="button" class="close" data-dismiss="alert"><i class="fa fa-minus-square"></i></button>

    <strong>Yay!</strong> {{ $message }}

  </div>

@endif

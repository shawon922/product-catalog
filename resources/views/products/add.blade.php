@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        {!! Form::open(['route' => ['MyRoute.addProduct'], 'files' => true]) !!}

            @include('products.form', ['submitButtonText' => 'Save Product'])

        {!! Form::close() !!}

    </div>
</div>

@endsection
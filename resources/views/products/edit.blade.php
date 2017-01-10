@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        
        {!! Form::model($product, ['method' => 'patch', 'route' => ['MyRoute.editProduct', $product->id], 'files' => true]) !!}

            @include('products.form', ['submitButtonText' => 'Update Product'])

        {!! Form::close() !!}

    </div>
</div>

@endsection


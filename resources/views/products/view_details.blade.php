@extends('layouts.app')


@section('content')

<div class="row">
    
    <div class="col-md-offset-2 col-md-6">

        <img src="{{ asset('images/'.$product->image) }}">
        <div class="caption">
            <h4 class="pull-right">
              Price: {{ $product->price }}
            </h4>
            <h4><a href="{{ url('/product-details/'.$product->id) }}">{{ $product->name }}</a></h4>
            <div class="clearfix"></div>
            <p>{{ $product->description }}</p>
            <div class="clearfix"></div>
            <p class="text-success">Quantity: {{ $product->quantity }}</p>
            <div class="clearfix"></div>
            
            <a href="{{ url('/') }}" class="btn btn-primary pull-right"> Back</a>
            
        </div>
    </div>

</div>

<div class="jumbotron" style="background-color: #FFFFFF;">

</div>


@endsection

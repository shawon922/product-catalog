@extends('layouts.app')


@section('content')

<section id="products">
    @if (Session::has('success'))

        <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            <h4>{{ Session::get('success') }}</h4>

        </div>

    @elseif (Session::has('error'))

        <div class="alert alert-danger">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            <h4>{{ Session::get('error') }}</h4>

        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-9">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Sort:</label>
                        <div class="col-md-8">
                            <form action="" method="GET">
                                <select name="sorting" class="form-control" onchange="this.form.submit();">
                                    <option value="">---</option>
                                    <option value="asc">A->Z</option>
                                    <option value="desc">Z->A</option>
                                </select>
                            </form>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Search</label>
                        <div class="col-md-8">
                            <form action="{{ url('/') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" value="{{ old('q') }}" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                    </span>                             
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>

            @if (!Auth::guest() && Auth::user()->role_id == 1)
                <div class="col-md-3">
                    <a class="btn btn-primary pull-right" href="{{ url('/add-product') }}">Add Product</a>
                </div>
            @endif
            
        </div>
        
    </div>

    <div class="col-xs-12" style="height:50px;"></div>

    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4">
            <div class="thumbnail">
                <a href="{{ url('/product-details/'.$product->id) }}">
                    <img src="{{ asset('images/_thumbnail/'.$product->image) }}">
                </a>
                <div class="caption">
                    <h4 class="pull-right">
                      Price: {{ $product->price }}
                    </h4>
                    <h4><a href="{{ url('/product-details/'.$product->id) }}">{{ $product->name }}</a></h4>
                    <div class="clearfix"></div>
                    <p class="text-success">Quantity: {{ $product->quantity }}</p>
                    <div class="clearfix"></div>
                    <p>
                        <a data-toggle="modal" href="{{ url('/product-details/'.$product->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>

                        @if (!Auth::guest() && Auth::user()->role_id == 1)
                        <a href="{{ url('/edit-product/'.$product->id) }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>

                        <a href="#" class="btn btn-danger" onclick="event.preventDefault(); check();"><i class="fa fa-trash"></i> Delete</a>

                        {!! Form::open(['method' => 'delete', 'route' => ['MyRoute.deleteProduct', $product->id], 'style' => 'display: none;', 'id' => 'delete-product']) !!}

                        {!! Form::close() !!}

                        @endif
                    </p>
                    
                </div>
            </div>
        </div>

        @endforeach

    </div>
    <div class="row text-center">
        {{ $products->appends(Request::only('q'))->appends(Request::only('sorting'))->links() }}
    </div>

</section>

<script type="text/javascript">
    function check()
    {
        if (confirm('Are you sure?')) {
            document.getElementById('delete-product').submit();
        }
    }


</script>

@endsection
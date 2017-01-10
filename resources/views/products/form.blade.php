
	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		{!! Form::label('name', 'Product Name') !!}
		{!! Form::text('name', null, array('class' => 'form-control')) !!}
	</div>
	@if ($errors->has('name'))
        <span class="error text-danger">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        {!! Form::label('description', 'Product Description') !!}
        {!! Form::textarea('description', null, array('class' => 'form-control', 'rows' => 3)) !!}
    </div>
    @if ($errors->has('description'))
        <span class="error text-danger">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
    @endif

	<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
		{!! Form::label('price', 'Price') !!}
		{!! Form::text('price', null, array('class' => 'form-control')) !!}
	</div>
	@if ($errors->has('price'))
        <span class="error text-danger">
            <strong>{{ $errors->first('price') }}</strong>
        </span>
    @endif


	<div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
		{!! Form::label('quantity', 'Quantity') !!}
		{!! Form::text('quantity', null, array('class' => 'form-control')) !!}
	</div>
	@if ($errors->has('quantity'))
        <span class="error text-danger">
            <strong>{{ $errors->first('quantity') }}</strong>
        </span>
    @endif

	<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
		{!! Form::label('image', 'Image') !!}
		{!! Form::file('image') !!}
	</div>
	@if ($errors->has('image'))
        <span class="error text-danger">
            <strong>{{ $errors->first('image') }}</strong>
        </span>
    @endif

	<div class="form-group">
        {!! Form::submit($submitButtonText, array('class' => 'btn btn-primary')) !!}

		{!! Form::button('Cancel', array('class' => 'btn btn-danger', 'onclick' => "event.preventDefault(); check();")) !!}

        {{-- <a href="#" class="btn btn-danger" onclick="event.preventDefault(); check();">Cancel</a> --}}
	</div>

    <script type="text/javascript">
        function check()
        {
            if (confirm('Are you sure?')) {
                window.location = "{{ url('/') }}";
            }
        }
    </script>
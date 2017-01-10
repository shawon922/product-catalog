@extends('layouts.app')

@section('content')
   
    <div class="container col-md-12">

        <div class="col-md-8 col-md-offset-2">
            @if (Session::has('error'))

                <div class="alert alert-danger">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    <h4>{{ Session::get('error') }}</h4>

                </div>
            @endif
        <div class="panel panel-default">

            <div class="panel-heading lg-heading" style="">

             Add User

            </div>

            <div class="panel-body col-md-12">

        

                {!! Form::open(['method' => 'POST', 'url' => 'addUser', 'class' => 'form-horizontal']) !!}



                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>



                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Role</label>

                        <div class="col-md-6">

                            {!! Form::select('role_id', ['1' => 'Admin', '2' => 'User'], null, array('id' => 'rolesList', 'class' => "form-control", 'placeholder' => '--Select Role--')) !!}

                            <span class="error-msg">{{ $errors->first('role_id', ':message') }} </span>

                        </div>


                    </div>


                    <div class="form-group">

                        <div class="col-md-9 col-md-offset-3"><button tabindex="submit" class="btn btn-primary btn-sm"><i class="fa fa-send"> Submit</i></button></div>

                    </div>

                    <!--input group-edns here-->

                {!! Form::close() !!}

            </div>

                <!--/panel-body ENDS HERE--> 

        </div>

            <!--/panel ENDS HERE--> 

        </div>

       <!--/col-md-8 col-md-offset-2 ENDS HERE--> 

    </div>

    <!--/container col-md-12 ENDS HERE--> 


@endsection


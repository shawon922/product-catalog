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

             Edit User

            </div>

            <div class="panel-body col-md-12">

        

                {!! Form::model($user, ['method' => 'POST', 'route' => ['MyRoute.editUser', $user->id], 'class' => 'form-horizontal']) !!}



                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

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
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

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
                                <input id="password" type="password" class="form-control" name="password">

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>



                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Role</label>

                        <div class="col-md-6">

                            {!! Form::select('role_id', ['1' => 'Admin', '2' => 'User'], $user->role_id, array('id' => 'rolesList', 'class' => "form-control", 'placeholder' => '--Select Role--')) !!}

                            <span class="error-msg">{{ $errors->first('role_id', ':message') }} </span>

                        </div>


                    </div>

                            

                    <div class="input-group col-md-12">

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







    <!-- Modal -->

    <div id="addRole" class="modal fade" role="dialog">

      <div class="modal-dialog">



        <!-- Modal content-->

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">Add Role</h4>

            </div>

            <div class="modal-body">

                <div class="panel-body col-md-12">

            

                    {!! Form::open(['method' => 'POST', 'url' => 'addRole', 'class' => 'form-horizontal']) !!}



                        <div class="input-group  col-md-12">

                            <div class="col-md-3">{!! Form::label('name', 'Role Name ', array('class' => 'required')) !!}</div>

                            <div class="col-md-9">

                                {!! Form::text('name', null, array('class' => "form-control", 'placeholder' => 'Role Name')) !!}

                                

                                <span class="error-msg">{{ $errors->first('name', ':message') }} </span>

                            </div>

                        </div>

                                

                        <div class="input-group col-md-12">

                            <div class="col-md-9 col-md-offset-3"><button tabindex="submit" class="btn btn-primary btn-sm"><i class="fa fa-send"> Submit</i></button></div>

                        </div>

                        <!--input group-edns here-->

                    {!! Form::close() !!}

                </div>

            </div>

                <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>

        </div>



      </div>

    </div>



@endsection


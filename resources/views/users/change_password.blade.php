@extends('layouts.admin')



@section('title')

    {{ $page_title }}

@endsection



@section('content')


    <div class="container col-md-12">

        <div class="col-md-8 col-md-offset-2">
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

        <div class="panel panel-default">

           <div class="panel-heading lg-heading" style="">

                Change Password

            </div>

            <div class="panel-body col-md-12">

        

                {!! Form::open(['method' => 'POST', 'url' => 'changePassword', 'class' => 'form-horizontal']) !!}



                    <div class="input-group  col-md-12">

                        <div class="col-md-4">{!! Form::label('current_password', 'Current Password ', array('class' => 'required')) !!}</div>

                        <div class="col-md-8">

                            {!! Form::password('current_password', array('class' => "form-control", 'placeholder' => 'Current Password')) !!}

                            

                            <span class="error-msg">{{ $errors->first('current_password', ':message') }} </span>

                        </div>

                    </div>



                    <div class="input-group  col-md-12">

                        <div class="col-md-4">{!! Form::label('password', 'New Password ', array('class' => 'required')) !!}</div>

                        <div class="col-md-8">

                            {!! Form::password('password', array('class' => "form-control", 'placeholder' => 'New Password')) !!}

                            

                            <span class="error-msg">{{ $errors->first('password', ':message') }} </span>

                        </div>

                    </div>



                    <div class="input-group  col-md-12">

                        <div class="col-md-4">{!! Form::label('password_confirmation', 'Confirm Password ', array('class' => 'required')) !!}</div>

                        <div class="col-md-8">

                            {!! Form::password('password_confirmation', array('class' => "form-control", 'placeholder' => 'Confirm Password')) !!}

                            

                            <span class="error-msg">{{ $errors->first('password_confirmation', ':message') }} </span>

                        </div>

                    </div>

                    

                            

                    <div class="input-group col-md-12">

                        <div class="col-md-8 col-md-offset-4"><button tabindex="submit" class="btn btn-primary btn-sm"><i class="fa fa-send"> Submit</i></button></div>

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


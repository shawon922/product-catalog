@extends('layouts.app')


@section('content')
    <style type="text/css">
        .custom-dropdown-menu {
            min-width: 120px;
        }

        .custom-btn {
            border: 0; 
            background: none; 
        }
    </style>
    <div class="container">
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
        
        <h4 class="h4">
            <span class="pull-left" style="margin-bottom: 15px;">Users</span>

            <a href="{{ url('/addUser') }}" class="btn btn-primary pull-right" style="margin-bottom: 15px;">New User</a>
        </h4>
        <table class="table table-bordered table-hover dataTable">
            <thead>
                <tr>
                    <th style="text-align: center;" width="10%">SL.</th>
                    <th style="text-align: center;" width="30%">Name</th>
                    <th style="text-align: center;" width="25%">Email</th>
                    <th style="text-align: center;" width="15%">Role</th>
                    <th style="text-align: center;" width="10%">Actions</th>
                </tr>
            </thead>
            
            <tbody>
                <?php $sl = 1; ?>
                @if (!empty($users))
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $sl++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->role_id == 1)
                                    Admin
                                @else
                                    User
                                @endif
                                
                            </td>
                            
                            <td style="">
                                
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-small dropdown-toggle" data-toggle="dropdown">
                                        <span class="glyphicon glyphicon-cog" style="margin-right: 0px;"></span>
                                        Action List
                                    </button>
                                    <ul class="dropdown-menu slidedown custom-dropdown-menu">
                                        <li>
                                            <a href="{{ url('/editUser/'.$user->id) }}" class="", style=""><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                        </li>

                                        <li>
                                            
                                            {!! Form::open(['method' => 'delete', 'route' => ['User.remove', $user->id], 'class' => '']) !!}
                                            
                                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Delete', ['type' => 'submit', 'class' => 'custom-btn', 'onClick' => "return check()", 'style' => 'width: 110px;']) !!}

                                            {!! Form::close() !!}
                                        </li>                                       
                                    </ul>
                                </div>
                                
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
            
        </table>
        <div class="row text-center">
            {{ $users->links() }}
        </div>
        
    </div>

    <script type="text/javascript">
        /*For user confirmation*/
            
        function check() {

            return confirm('Are you sure ?');

        }
    </script>

    
@endsection

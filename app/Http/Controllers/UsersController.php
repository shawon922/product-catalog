<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use Mail;
use Auth;
use Hash;
use App\User;
use Session;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest ;



class UsersController extends Controller
{
    
	public function index()
	{
    	$users = User::paginate(5);

		return view('users.index', compact('page_title', 'users'));
	}

    public function add()
    {
        return view('users.add_user');
    }

    public function storeUser(AddUserRequest $request)
    {
        $user = $request->all();

        $user['password'] = bcrypt($user['password']);

        User::create($user);

        Session::flash('success', 'The user has been added successfully. Thank you.');
        return redirect('/UsersList');

    }


    public function edit($id = null)
    {        
        $user = User::where([['id', $id]])->first();

        return view('users.edit_user', compact('user'));
    }

    public function updateUser($id = null, EditUserRequest $request)
    {
        $user = $request->all();

        if (empty($user['password']) || empty($user['password_confirmation'])) {
            unset($user['password']);
        } else {
            $user['password'] = bcrypt($user['password']);
        }

        $update = User::where([['id', $id]])->first();

        $update->update($user);

        Session::flash('success', 'The user has been added successfully. Thank you.');
        return redirect('/UsersList');

    }

    public function destroy($id = null, Request $request)
    {
        $delete = User::where([['id', $id]])->first();

        if (empty($delete)) {
            abort(404, 'Not Found.');
        }

        try {
            $delete->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            
            Session::flash('error', 'Sorry! The user could not be deleted.');
            return redirect('/UsersList');
        }
        
        Session::flash('success', 'The user has been deleted successfully. Thank you.');
        return redirect('/UsersList');
    }

}

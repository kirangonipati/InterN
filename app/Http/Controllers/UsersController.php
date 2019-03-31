<?php

namespace App\Http\Controllers;

use App\Forms\CreateUserForm;
use App\User;
use App\Group;
use App\UserGroup;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        $groups = Group::all();
        return view('users.index', compact('users'), compact('groups'));
    }

    public function add(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(CreateUserForm::class, [
            'method' => 'POST',
            'url' => route('users.store')
        ]);

        return view('users.create', compact('form'));
    }

    public function store(Request $request)
    {
        $array = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt('abcd')
        ];
        $user = User::create($array);
        return redirect('/users');
        #return redirect('users.index')->with('message', ["User added successfully!"]);
    }

    public function delete($id)
    {
        User::where('id', '=', $id)->delete();
        UserGroup::where('user_id' , '=', $id)->delete();
        return redirect('/users');
    }

    public function deleteConfirmation($id)
    {
        $user = User::find($id);
        return view('users.deleteconfirmation', compact('user'));
    }

}

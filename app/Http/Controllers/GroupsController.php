<?php

namespace App\Http\Controllers;

use App\Forms\CreateGroupForm;
use App\Group;
use App\UserGroup;
use App\User;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class GroupsController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(CreateGroupForm::class, [
            'method' => 'POST',
            'url' => route('groups.store')
        ]);

        return view('groups.create', compact('form'));
    }

    public function store(Request $request, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(CreateGroupForm::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $group = Group::create([
            'name' => $request->get('name')
        ]);
        return redirect('/groups')->with('message', ["Group created successfully!"]);
    }

    public function adduser($groupid){
        $group = Group::find($groupid);
        $usergroup = UserGroup::where('group_id', '=', $groupid)->with('user')->get();
        $allUsers = User::all();
        $already_array = $usergroup->pluck('user.id')->toArray();
        $remainingUsers = $allUsers->filter(function ($value, $key) use($already_array) {
            return !in_array($value->id, $already_array);
        });

        return view('groups.adduser', compact('group', 'usergroup', 'remainingUsers' ));
    }

    public function mapuser(Request $request, $group_id){
        $g = UserGroup::create([
            'user_id' => $request->get('user_id'),
            'group_id' => $group_id
        ]);
        return redirect('/groups');
    }

    public function deleteuser($groupid, $userid){
        UserGroup::where('group_id', '=', $groupid)->where('user_id', '=', $userid)->delete();
        return redirect("/groups/$groupid/adduser");

    }

    public function deletegroup($groupid){
        UserGroup::where('group_id', '=', $groupid)->delete();
        Group::where('id', '=', $groupid)->delete();
        return redirect("/groups");
    }
}

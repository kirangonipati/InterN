@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $group->name }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                            Existing Users of the group:
                            <ul>
                            @if (!$usergroup->isEmpty())
                                @foreach($usergroup as $user)
                                        <li>
                                            {{ $user->user->name }}
                                            <a href="/groups/{{$group->id}}/deleteuser/{{$user->user->id}}">Delete User</a>
                                        </li>
                                @endforeach
                            @else
                                <li>None</li>
                            @endif
                            </ul>
                        </div>
                        <hr/>
                        <div>
                            User List:
                            <form method="POST" action="/groups/{{$group->id}}/mapuser">
                            {{csrf_field()}}
                            <select name="user_id">
                                <option value=""></option>
                                @foreach($remainingUsers as $user)
                                    <option value="{{$user->id}}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <input type="submit" class="btn btn-primary" value="Add User"/>
                            </form>
                        </div>
                        <hr/>
                        <div>
                            <a href="/groups/{{$group->id}}/deletegroup" class="btn btn-danger">Delete Group</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
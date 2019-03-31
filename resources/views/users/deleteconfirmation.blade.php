@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">List Users</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p>Are you sure you want to delete the user {{ $user->name }} ? </p>
                            <p><a href="/users/{{$user->id}}/delete">Yes</a>
                                <a href="/users">No</a></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
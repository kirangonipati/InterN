@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">List Users</div>

                    <table class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <tr>
                            <table>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="/users/{{ $user->id }}/delete-confirmation">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </table>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
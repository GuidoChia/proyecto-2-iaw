@extends('layouts.app')

@section('content')
<div class="container-fluid flex-center position-ref full-height">
    <div class="jumbotron text-center">
        <h1>Users management</h1>
        <div class="content">
            <form action="{{route('manage-users')}}" method="GET" role="search">
                @csrf
                <div class="input-group">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm">
                                <input class="form-control input-lg capitalized" name="user-input"
                                       placeholder="Username">
                            </div>
                            <div class="col-sm-1">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@if(isset($users))
<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>E-mail</th>
            <th>Type</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->type}}</td>
            @if ($user->type=='user')
            <td>
                <form action="{{route('set-as-admin')}}" method="post">
                    @csrf
                    <input type="hidden" name="user-id" value="{{$user->id}}">
                    <button class="btn btn-danger" type="submit">Set as admin</button>
                </form>
            </td>
            @endif
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endif

@if(isset($message))
<h1>{{$message}}</h1>
@endif
@endsection

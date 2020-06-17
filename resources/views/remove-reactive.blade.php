@extends('layouts.app')

@section('content')
<div class="container-fluid flex-center position-ref full-height">
    <div class="alert alert-danger">
        <ul>
            <li>If you remove a reactive, all its stock will be removed, and this CAN'T BE UNDONE.</li>
        </ul>
    </div>
    <div class="jumbotron text-center">
        <h1>Reactive removal</h1>
        <div class="content">
            <form action="{{route('remove-reactive')}}" method="POST" role="remove">
                @csrf
                <div class="input-group">
                    @include('reactive-input')
                    <button class="btn btn-primary" type="submit">Remove</button>
                </div>
            </form>
        </div>
    </div>
    @if(isset($message))
    <div class="alert alert-success">
        <ul>
            <li>{{$message}}</li>
        </ul>
    </div>
    @endif

</div>

@endsection

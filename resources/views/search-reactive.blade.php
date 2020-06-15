@extends('layouts.app')

@section('content')
<div class="container-fluid flex-center position-ref full-height">
    <div class="jumbotron text-center">
        <h1>Reactive search</h1>
        <div class="content">
            <form action="/search-reactive" method="GET" role="search">
                @csrf
                <div class="input-group">
                    <input class="form-control input-lg" name="reactive-input"
                           placeholder="What reactive are you looking for?">
                    <div class="input-group-btn">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if(isset($reactives))
    @include('search-reactive-result')
    @endif
    @if(isset($message))
    <h1>{{$message}}</h1>
    @endif
</div>

@endsection

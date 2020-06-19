@extends('layouts.app')

@section('content')
<div class="container-fluid flex-center position-ref full-height">
    <div class="jumbotron text-center">
        <h1>Reactive search</h1>
        <div class="content">
            <form action="{{route('search-reactive-result')}}" method="GET" role="search">
                @csrf

                <div class="input-group">
                    @include('reactive-input')
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>
@if(isset($reactive))
@include('search-reactive-result')
@endif


@endsection

@extends('layouts.app')

@section('content')
<div class="container-fluid flex-center position-ref full-height">
    <div class="jumbotron text-center">
        <h1>Stock search</h1>
        <div class="content">
            <form action="{{route('search-stock-result')}}" method="GET" role="search">
                @csrf
                <div class="input-group">
                    @include('reactive-input')
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if(isset($reactive))
    @include('search-stock-result')
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

@endsection

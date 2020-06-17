@extends('layouts.app')

@section('content')
<div class="container-fluid flex-center position-ref full-height">
    <div class="jumbotron text-center">
        <h1>Stock update</h1>
        <div class="content">
            <form action="{{route('update-stock')}}" method="POST" role="update_reactive">
                @csrf
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-4">
                            @include('reactive-input')
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control input-lg" name="amount-input" placeholder="Amount">
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control input-lg" name="expiration-date-input"
                                   placeholder="Expiration date (Year-Month-Day)">
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control" name="type-input">
                                <option>Up</option>
                                <option>Down</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <button class="btn btn-primary" type="submit">Upload</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(isset($message))
    <div class="alert alert-primary">
        <ul>
            <li>{{$message}}</li>
        </ul>
    </div>
    @endif
</div>

@endsection

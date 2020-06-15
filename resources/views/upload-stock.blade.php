@extends('layouts.app')

@section('content')
<div class="container-fluid flex-center position-ref full-height">
    <div class="jumbotron text-center">
        <h1>Stock upload</h1>
        <div class="content">
            <form action="/upload-stock" method="POST" role="upload_reactive">
                @csrf
                <div class="input-group">
                    <input class="form-control input-lg" name="reactive-input" placeholder="Reactive">
                    <input class="form-control input-lg" name="amount-input" placeholder="Amount">
                    <input class="form-control input-lg" name="expiration-date-input" placeholder="Expiration date">
                    <div class="input-group-btn">
                        <button class="btn btn-primary" type="submit">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if(isset($message))
    <h1>{{$message}}</h1>
    @endif
</div>

@endsection

@extends('layouts.app')

@section('content')
<div class="container-fluid flex-center position-ref full-height">
    <div class="jumbotron text-center">
        <h1>Reactive upload</h1>
        <div class="content">
            <form action="/upload-reactive" method="POST" role="upload_reactive">
                @csrf
                <div class="input-group">
                    <input class="form-control input-lg" name="reactive-input" placeholder="Reactive">
                    <input class="form-control input-lg" name="description-input" placeholder="Description">
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

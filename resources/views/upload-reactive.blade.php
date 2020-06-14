@extends('layouts.app')

@section('content')
<div class="container-fluid flex-center position-ref full-height">
    <div class="jumbotron text-center">
        <h1>Reactive upload</h1>
        <div class=
             "content">
            <form> @csrf
                <div class="form-group">
                    <input class="form-control input-lg" id="reactive-input"
                           placeholder="Reactive">
                </div>

                <div class="form-group">
                    <input class="form-control input-lg" id="description-input" placeholder="Description">
                </div>
                <div class="form-group text-left">
                    <button class="btn btn-primary" id="upload-button" type="button">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

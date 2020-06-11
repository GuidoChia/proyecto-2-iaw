@extends('layouts.app')

@section('content')
<div class="container-fluid flex-center position-ref full-height">
    <div class="jumbotron text-center">
        <h1>Reactive search</h1>
        <div class="content">
            <form>
                <div class="input-group">
                    <input class="form-control input-lg" id="reactive-input"
                           placeholder="What reactive are you looking for?">
                    <input class="form-control input-lg" id="presentation-input" placeholder="Presentation">
                    <div class="input-group-btn">
                        <button class="btn btn-primary" id="search-button" type="button">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

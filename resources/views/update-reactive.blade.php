@extends('layouts.app')

@section('content')
<div class="container-fluid flex-center position-ref full-height">
    <div class="jumbotron text-center">
        <h1>Reactive update</h1>
        <div class="content">
            <form action="{{route('update-reactive')}}" method="POST" role="update_reactive"
                  enctype="multipart/form-data">
                @csrf
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-sm">
                            @include('reactive-input')
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <input class="form-control input-lg capitalized" name="new-name-input"
                                   placeholder="New name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <input class="form-control input-lg" name="description-input" placeholder="Description">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm text-left">
                            Barcode
                            <input type="file" name="barcode-file-input" accept=".jpg,.png,.jpeg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <button class="btn btn-primary" type="submit">Update</button>
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

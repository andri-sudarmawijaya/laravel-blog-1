@extends('layouts.app')

@section('content')
    <h1>Welcome {{ $user->name }}</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        <img src="{{ Session::get('path') }}" class="img-responsive">
    @endif
    <p>Upload an Avatar:</p>
    <form class="form" action="/avatars" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="avatar"></input>
        <button type="submit" name="button">Save Avatar</button>
    </form>
    <img src="https://s3-eu-west-1.amazonaws.com/carawebs-test-laravel/avatars/{{ $user->id }}/avatar.jpeg" alt="" class="img-responsive">
    <br>
@stop

@extends('layouts.app')

@section('content')
    <h1>Create an Article</h1>
    <hr>
    <div class="row">
        <div class="col-md-8">
            @include ('blog::errors.list')
            {{-- Uses a named route ------------------------------------------}}
            {!! Form::open(['route'=>['posts.store'], 'files'=>true]) !!}
            @include('blog::posts.form', ['submitButtonText' => 'Create Post'])
            {!! Form::close() !!}

        </div>
    </div>

@stop

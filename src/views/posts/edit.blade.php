@extends('layouts.app')

@section('content')
  <h1>Edit Article: {{ $article->title}}</h1>
  <hr>
  <div class="row">
    <div class="col-md-12">

      {{-- Uses a named route ------------------------------------------------}}
      {{-- See: https://laravelcollective.com/docs/5.3/html#opening-a-form ---}}
      {!! Form::model($article, ['method'=> 'PATCH', 'route'=>['posts.update', $article->id], 'files'=>true]) !!}
        @include('blog::posts.form', ['submitButtonText' => 'Update Article'])
      {!! Form::close() !!}

{{-- @TODO: ADD ERRORS  --}}
      {{-- @include ('errors.list') --}}

    </div>
  </div>

@stop

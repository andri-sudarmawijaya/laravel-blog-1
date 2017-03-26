@extends('layouts.app')

@section('content')
    <h1>{{ $article->title }}</h1>
    <h2>By: {{ $article->user->name }}</h2>
    {{-- @if (isset($article->thumbnail))
    <img src="{{URL::asset( $article->thumbnail )}}" alt="" class="img-responsive"/>
@endif --}}
{!! $article->content !!}
<hr>
{{-- @if( $current_user->id === $article->user->id )
<h2>{{ $article->user->name }}: You can Edit!</h2>
<a href="{!! action('ArticlesController@edit', ['id' => $article->id]) !!}" class="btn btn-default">Edit &raquo;</a>
@endif --}}


@stop

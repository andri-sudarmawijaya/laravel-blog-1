@extends('layouts.app', ['body_class' => 'articles index'])
@section('bodyClass', ' class="articles index"')

@section('content')
    <h1>All Articles</h1>
    @foreach($articles as $article)
        {{-- {{ dd($article) }} --}}
        <div class="row article">
            <div class="col-md-4">
                @if(! empty( $article->thumbnail ))
                    {{-- <img src="{{ URL::asset( $article->thumbnail ) }}" alt="" class="img-responsive"/>
                    <img src="{{ Storage::disk('s3')->url( $article->thumbnail ) }}" alt="" class="img-responsive"/> --}}
                @endif
            </div>
            <div class="col-md-8">
                <h2>{{$article->title}}</h2>
                <article>
                    {{ $article->excerpt }}<br>
                    {{-- {!! str_limit( $article->body, $limit = 200, $end = '&hellip;' ) !!} --}}
                    <p>
                        <a href="{!! action('\Carawebs\Blog\Controllers\PostController@show', ['id' => $article->id]) !!}" class="">More &raquo;</a>
                    </p>
                </article>
                <h5>Owner: {{ $article->user->name }}</h5>
                <p>
                    <a href="{!! action('\Carawebs\Blog\Controllers\PostController@show', ['id' => $article->id]) !!}" class="btn btn-default btn-sm">More &raquo;</a>
                    @if( $current_user->id === $article->user->id )
                        <a href="{!! action('\Carawebs\Blog\Controllers\PostController@edit', ['id' => $article->id]) !!}" class="btn btn-default btn-sm">Edit &raquo;</a>
                        {!! Form::open(['method' => 'DELETE',
                            'route' => ['posts.destroy', $article->id],
                            'id' => 'form-delete-articles-' . $article->id]) !!}
                            <a href="" class="data-delete"
                            data-title="{{$article->title}}"
                            data-form="articles-{{ $article->id }}">
                            <i class="glyphicon glyphicon-remove icon-spacer"></i> &nbsp;Delete</a>
                            {!! Form::close() !!}
                        @endif
                    </p>
                </div>
                <hr>
            </div>
        @endforeach
    @stop
    @push('footer-jquery-scripts')
        <script>
        $(function () {
            $('.data-delete').on('click', function (e) {
                var resourceTitle = $(this).data('title');
                if (!confirm('Are you sure you want to delete ' + resourceTitle + '?')) return;
                e.preventDefault();
                $('#form-delete-' + $(this).data('form')).submit();
            });
        });
        </script>
    @endpush

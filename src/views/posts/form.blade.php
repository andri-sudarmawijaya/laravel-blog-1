{{-- Title -------------------------------------------------------------------}}
<div class="form-group">
  {!! Form::label('title') !!}
  {!! Form::text('title', null, ['class'=> 'form-control']) !!}
</div>
{{-- Body --------------------------------------------------------------------}}
<div class="form-group">
  {!! Form::label('content') !!}
  {!! Form::textarea('content', null, ['class'=> 'form-control', 'id'=>'article-body']) !!}
</div>
{{-- Excerpt -----------------------------------------------------------------}}
<div class="form-group">
  {!! Form::label('excerpt', 'Enter a brief excerpt for this article - this will be used as a preview.') !!}
  {!! Form::textarea('excerpt', null, ['class'=> 'form-control', 'id'=>'article-excerpt', 'rows'=>'10']) !!}
</div>
{{-- Thumbnail ---------------------------------------------------------------}}
<div class="form-group">
  {!! Form::label('thumbnail', 'Select an image to associate with this article.') !!}
  {!! Form::file('thumbnail', null, ['class'=> 'form-control', 'id'=>'article-thumbnail']) !!}
</div>
{{-- Tags --------------------------------------------------------------------}}
{{-- <div class="form-group">
  {!! Form::label('tag_list') !!}
  {!! Form::select('tag_list[]', $tags, null, ['class'=> 'form-control', 'multiple']) !!}
</div> --}}
{{-- Published At ------------------------------------------------------------}}
{{-- <div class="form-group">
  {!! Form::label('published_at') !!}
  {!! Form::input('date', 'published_at', date('Y-m-d'), ['class'=> 'form-control']) !!}
</div> --}}
{{-- submit ------------------------------------------------------------------}}
<div class="form-group">
  {!! Form::submit($submitButtonText, null, ['class'=> 'btn btn-primary form-control']) !!}
</div>

@extends('layouts.app')

@section('title', '首页')

@section('content')

<!-- 错误信息 -->
@include('shared.errors')

<a class="btn btn-primary" style="margin-bottom:20px" href="{{ route('articles.create') }}">+ 新建文章</a>

@forelse($articles as $article)
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a></h3>
  </div>
  <div class="panel-body">
    <p>{{ $article->content}}</p>
  </div>
</div>
@endforeach

@endsection

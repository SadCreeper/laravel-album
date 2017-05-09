@extends('layouts.app')

@section('title', $article->title)

@section('content')

<div class="z-panel">
    <div class="z-panel-header">
        <h3>{{ $article->title }}</h3>
        <span class="glyphicon glyphicon-time"></span><span> {{ $article->created_at }}</span>
    </div>
    <div class="z-panel-body" style="padding:20px;">
        {{ $article->content }}
    </div>
</div>

@endsection

@extends('layouts.app')

@section('title', '首页')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>新增一篇文章</h3>

            @include('shared.errors')

            {{--新增文章表单--}}
            <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="text" class="form-control" name="title" placeholder="请填写标题" style="margin-bottom: 20px;">
                <textarea class="z-textarea" name="content" rows="20" style="width:100%;"></textarea>
                <button type="submit" class="btn btn-primary">完成</button>
            </form>

        </div>
    </div>
</div>

@endsection

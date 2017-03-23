@extends('layouts.app')

@section('title', $album->name)

@section('content')

<!-- 相册信息 -->
<div class="row">
    <div class="col-sm-3">
        @if( $album->cover == '' )
            <img class="img-responsive" src="/img/album/covers/default.jpg">
        @else
            <img class="img-responsive" src="{{ $album->cover }}">
        @endif
    </div>
    <div class="col-sm-9">
        <h2>{{ $album->name }}</h2>
        <p>{{ $album->intro }}</p>

        <!-- 上传照片：弹出框按钮 -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadPhoto">
          上传照片
        </button>
        <!-- 编辑相册：弹出框按钮 -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editAlbum">
          编辑相册
        </button>
        <!-- 删除相册：弹出框按钮 -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAlbum">
          删除相册
        </button>
    </div>
</div>

<!-- 上传照片：弹出框 -->
<div class="modal fade" id="uploadPhoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">上传照片</h4>
      </div>
      <div class="modal-body">
          <form action="{{ route('photos.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="album_id" value="{{ $album->id }}">
            <div class="form-group">
              <input type="file" name="photo" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="点此为此照片添加一个标题">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="intro" placeholder="点此为此照片添加一段描述">
            </div>
            <button type="submit" class="btn btn-primary">确定</button>
          </form>
      </div>
    </div>
  </div>
</div>

<!-- 编辑相册：弹出框 -->
<div class="modal fade" id="editAlbum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">编辑相册</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" action="{{ route('albums.update', $album->id) }}" method="post"  enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">相册名称</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" required value="{{ $album->name }}">
              </div>
            </div>
            <div class="form-group">
              <label for="intro" class="col-sm-2 control-label">相册简介</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="intro" name="intro" value="{{ $album->intro }}">
              </div>
            </div>
            <div class="form-group">
                <label for="intro" class="col-sm-2 control-label">封面图片</label>
                <div class="col-sm-10">
                  <input type="file" name="cover">
                </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">确认</button>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>

<!-- 删除相册：弹出框 -->
<div class="modal fade" id="deleteAlbum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="text-align:center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">确认删除该相册吗？</h4>
      </div>
      <div class="modal-body">
          <form action="{{ route('albums.destroy', $album->id) }}" method="post" style="display: inline-block;">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger">删除</button>
          </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
      </div>
    </div>
  </div>
</div>

<!-- 照片显示 -->
<hr>
<div class="row masonry">
    @each('shared.photo', $photos, 'photo')
</div>

{!! $photos->render() !!}




@endsection

@section('script')
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
<!--瀑布流-->
<script>
$('.masonry').imagesLoaded(function() {
    $('.masonry').masonry({
    itemSelector: '.item'
    });
});
</script>
@endsection

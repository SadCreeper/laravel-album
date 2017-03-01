<div class="col-md-3 col-sm-4 photo item">
    <div class="panel panel-default">
      <div class="panel-body">
        <img class="img-responsive" src="{{ $photo->src }}">
        <p class="photo-name">{{ $photo->name }}</p>
        @if($photo->intro == '')
            <p class="photo-intro">未添加描述..</p>
        @else
            <p class="photo-intro">{{ $photo->intro }}</p>
        @endif
        <!-- 编辑照片：弹出框按钮 -->
        <span class="glyphicon glyphicon-cog photo-conf" data-toggle="modal" data-target="#editPhoto{{ $photo->id }}"></span>
      </div>
    </div>
</div>

<!-- 编辑照片：弹出框 -->
<div class="modal fade" id="editPhoto{{ $photo->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">编辑照片</h4>
      </div>
      <div class="modal-body">
          <form action="{{ route('photos.update', $photo->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <input type="text" class="form-control" name="name" value="{{ $photo->name }}" placeholder="点此为此照片添加一个标题">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="intro" value="{{ $photo->intro }}" placeholder="点此为此照片添加一段描述">
            </div>
            <button type="submit" class="btn btn-primary">确定</button>
          </form>
          <form action="{{ route('photos.destroy', $photo->id) }}" method="post" style="float:right;position:relative;top:-35px">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger">删除</button>
          </form>

      </div>
    </div>
  </div>
</div>

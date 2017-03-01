<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Photo;

use Image;

class PhotosController extends Controller
{
    //相片信息存储
    public function store(Request $request)
    {
        //数据验证
        $this->validate($request,[
            'photo' => 'required',
        ]);

        //生成路径，图片存储
        $name = "photo".time();
        $src = "/img/album/photos/". $name .".jpg";
        Image::make($request->photo)->save(public_path($src));

        //如果输入了标题则存储
        if($request->has('name')){
            $name = $request->name;
        }

        //存储数据
        $photo = Photo::create([
            'album_id' => $request->album_id,
            'name' => $name,
            'intro' => $request->intro,
            'src' => $src,
        ]);

        //返回
        session()->flash('success', '上传成功');
        return back();
    }

    //照片信息更新
    public function update(Request $request, $id)
    {
        //更新
        $photo = Photo::findOrFail($id);
        $photo->update([
            'name' => $request->name,
            'intro' => $request->intro,
        ]);

        //返回
        session()->flash('success', '编辑成功');
        return back();
    }

    //照片删除
    public function destroy($id)
    {
        //删除
        $photo = Photo::findOrFail($id);
        $photo->delete();

        //返回
        session()->flash('success', '删除成功');
        return back();
    }
}

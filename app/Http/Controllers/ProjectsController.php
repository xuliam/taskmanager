<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class ProjectsController extends Controller
{
//    调用Reqest类，实例化变成$request(实例化的名字随便取）
    public function store(Request $request){

//        $request->thumbnail

//        调用request的uer方法-user实例（调取project的当前用户），然后调user类的projects关系（user类里有和projects的方法），最后调用create方法（把数据存进数组里）

//        dd($request->all()); 调用当前全部信息；
        $request->user()->projects()->create([
            'name' => $request->name,
            'thumbnail' => $this->thumb($request)
        ]
    );
        //return'adfa ';
    }

    public function thumb($request){
// 用request->thumbnail获取到图片对象,然好用store方法存储；括号里面是文件夹的名称；最后把这一串方法的返回值存到$path里
//       $path= $request->thumbnail->store('public\thumbs');
//        return $request->hasFile('thumbnail') ? $request->thumbnail->store('public/thumbs') : null;
        if($request->hasFile('thumbnail')){
            $thumb = $request->thumbnail;
            $name = $thumb->hashName();//把名字秘名
            $thumb->storeAs('public\thumbs\original', $name);

            //调用image的make方法来读取thumb信息,用resize方法改变图片大小
            $path = storage_path('app/public/thumbs/cropped/'.$name);
            Image::make($thumb)->resize(200,100)->save($path);
            return $name;
        }


    }

}

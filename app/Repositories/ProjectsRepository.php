<?php


namespace App\Repositories;
use Image;
use App\Project;


class ProjectsRepository
{
    public function list()
    {
//        request()->user()获取了当前用户，然后调用当前用户的关系方法projects(),在用get方法获得项目，最后把它保存在变量projects
        return request()->user()->projects()->get();
    }


    public function create($request)
    {
//        $request->thumbnail

//        调用request的uer方法-user实例（调取project的当前用户），然后调user类的projects关系（user类里有和projects的方法），最后调用create方法（把数据存进数组里）

//        dd($request->all()); 调用当前全部信息；
        $request->user()->projects()->create([
                'name' => $request->name,
                'thumbnail' => $this->thumb($request)
            ]
        );
    }

    public function find($id)
    {
        return Project::findOrFail($id);
    }

    public function todos($project)
    {
       return $project->tasks()->where('completion', 0)->get();
    }

     public function dones($project)
    {
       return $project->tasks()->where('completion', 1)->get();
    }



    public function update($request, $id)
    {
        $project = $this->find($id);
        $project->name = $request->name;
        if($request->hasFile('thumbnail')){
            $project->thumbnail = $this->thumb($request);
        }

        $project->save();
    }

    public function delete($id)
    {
        $project = $this->find($id);
        $project->delete();
    }

    public function thumb($request){
// 用request->thumbnail获取到图片对象,然好用store方法存储；括号里面是文件夹的名称；最后把这一串方法的返回值存到$path里
//       $path= $request->thumbnail->store('public\thumbs');
//        return $request->hasFile('thumbnail') ? $request->thumbnail->store('public/thumbs') : null;
        if($request->hasFile('thumbnail')){
            $thumb = $request->thumbnail;
            $name = $thumb->hashName();//把名字秘名
            $thumb->storeAs('public\thumbs\original', $name);
//保存图片的第二种方法；
//            //调用image的make方法来读取thumb信息,用resize方法改变图片大小
//            $path = storage_path('app/public/thumbs/cropped/'.$name);
//            Image::make($thumb)->resize(200,100)->save($path);
            return $name;
        }


    }

}
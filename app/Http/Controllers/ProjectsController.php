<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Repositories\ProjectsRepository;
use App\Project;

class ProjectsController extends Controller
{
    // 把实例化的repo1的值赋给来变量repo，从而repo这个变量可以在别的方法里调用；
    protected $repo;
    public function __construct(ProjectsRepository $repo1)
    {
        $this->repo=$repo1;
        $this->middleware('auth');

    }


//    增
    public function create()
    {
//        显示一个增加的表单，我们用的模态框，这里我们就不用来l
    }

//    调用CreateProjectRequest类，实例化变成$request(实例化的名字随便取）
    public function store(CreateProjectRequest $request){
//        相当于实例化的ProjectsRepository，然后调他的create方法；
         $this->repo->create($request);
        return back();

    }

//删
    public function destroy($id)
    {
        $this->repo->delete($id);
        return back();
    }

//    改

    public function update(UpdateProjectRequest $request, $id)
    {
        $this->repo->update($request, $id);
        return back();
    }

//    查

    public function index()
    {
        $projects = $this->repo->list();
//
////        request()->user()获取了当前用户，然后调用当前用户的关系方法projects(),在用get方法获得项目，最后把它保存在变量projects
//        $projects = request()->user()->projects()->get();
//        $projects为一个集合的数据类型collection，我们可以用collect方法来给projects变量做一个判断
//        return collect()->isEmpty() ? 'true' : 'false';
        //dd($projects);
//       调用view里面是用了一个php方法compact（），意思是包含变量projects，注意，这里不用$。
        return view('welcome',compact('projects'));
    }


//第一个Project是数据模型 上面要写上use App\Project， 第二个$project是路由参数。（传进来了个路由参数，laravel自动根据路由信息找到这个$project的id
    public function show(Project $project)
    {
////     方法1   找到project 通过他和tasks之间的关系，找到所有的任务，执行where方法看谁没有完成，get到他们
//        $todos =$project->tasks()->where('completion', 0)->get();
//        方法2
        $todos = $this->repo->todos($project);
        $dones = $this->repo->dones($project);
        //        $project = $this->repo->find($id);

        return view('projects.show',compact('project','todos','dones'));
    }







}

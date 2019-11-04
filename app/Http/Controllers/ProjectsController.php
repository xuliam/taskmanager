<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Repositories\ProjectsRepository;

class ProjectsController extends Controller
{
    // 把实例化的repo1的值赋给来变量repo，从而repo这个变量可以在别的方法里调用；
    protected $repo;
    public function __construct(ProjectsRepository $repo1)
    {
        $this->repo=$repo1;
    }



//    调用CreateProjectRequest类，实例化变成$request(实例化的名字随便取）
    public function store(CreateProjectRequest $request){
//        相当于实例化的ProjectsRepository，然后掉他的create方法；
        $this->repo->create($request);
        return back();

    }

    public function destroy($id)
    {
        $this->repo->delete($id);
            return back();
    }



}

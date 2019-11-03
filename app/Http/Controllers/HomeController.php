<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function root()
    {
//        request()->user()获取了当前用户，然后调用当前用户的关系方法projects(),在用get方法获得项目，最后把它保存在变量projects
        $projects = request()->user()->projects()->get();
//       调用view里面是用了一个php方法compact（），意思是包含变量projects，注意，这里不用$。
         return view('welcome',compact('projects'));
    }


}

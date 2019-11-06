<?php


namespace App\Repositories;

use App\Task;

class TasksRepository
{
    public function create($request)
    {
        //        dd($request->project);
       return Task::create([
            'name'=>$request->name,
            'completion'=>(int)false,
            'project_id'=>$request->project
        ]);
   }

    public function find($id)
    {
        return Task::findOrFail($id);
   }

    public function check($task)
    {
       return $task->update([
             'completion'=>(int)true
         ]);
   }

    public function destroy($id)
    {
        $this->find($id)->delete();
   }


}

<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Models\Shared;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function  submit(TaskRequest $req){
        $task = new Task();
        $task->name = $req->input('name');
        $task->owner = $req->input('owner');
        $task->description = $req->input('description');
        $task->status = $req->input('status');
        $task->todo_date = $req->input('todo_date');

        $task->save();

        // $shared = new Shared();
        // $shared->taskId = $task->id;
        // $shared->userId = Auth::user()->id;
        // $shared->save();

        return redirect()->route('welcome')->with('success', 'Task added');
    }

    public function allData(){
        $tasks = Task::where('owner', Auth::user()->email )->where('status','no status')->get();
        return view('tasks', ['data' => $tasks]);
    }
    public function showOneTask($id){
        return view('one-task', ['data' => Task::find($id)]);
    }

    public function updateTask($id){
        return view('update-task', ['data' => Task::find($id)]);
    }
    public function  updateTaskSubmit($id, TaskRequest $req){
        $task = Task::find($id);
        $task->name = $req->input('name');
        $task->owner = $req->input('owner');
        $task->description = $req->input('description');
        $task->status = $req->input('status');
        $task->todo_date = $req->input('todo_date');

        $task->save();

        return redirect()->route('task-data-one', $id)->with('success', 'Task updated');
    }
    public function deleteTask($id){
        Task::find($id)->delete();
        return redirect()->route('task-data', $id)->with('success', 'Task deleted');
    }

    //=========================================================================================


    public function sharedTask($id){
        return view('update-taskShared', ['data' => Task::find($id)]);
    }
    public function  sharedTaskSubmit($id){
        $shared = new Shared();
        $shared->taskId = $id;
        $shared->userId = DB::table('users')->where('email', $_POST['shared_user'])->value('id');

        $shared->save();
        return redirect()->route('task-data-one', $id)->with('success', 'Task was shared');
    }

    
    //========================================================================================

    public function allDataShared(){
        $tasks = DB::table('tasks')
                ->join('shared_tasks','tasks.id','=','shared_tasks.taskId')
                ->join('users', 'shared_tasks.userId', '=', 'users.id') 
                ->select('tasks.id','tasks.name', 'tasks.description', 'tasks.todo_date', 'tasks.owner', 'users.email')
                ->get();
        return view('shared-task', ['data' => $tasks]);

        //SELECT tasks.name, tasks.description, tasks.todo_date, tasks.owner, `users`.`email` FROM `tasks` 
        //JOIN shared_tasks ON `tasks`.`id`=`shared_tasks`.`taskId` JOIN users ON users.id=shared_tasks.userId 
    }

    public function showOneTaskShared($id){
        return view('one-taskShared', ['data' => Task::find($id)]);
    }
    public function updateTaskShared($id){
        return view('update-taskShared', ['data' => Task::find($id)]);
    }
    public function  updateTaskSubmitShared($id, TaskRequest $req){
        $task = Task::find($id);
        $task->name = $req->input('name');
        $task->description = $req->input('description');
        $task->status = $req->input('status');
        $task->todo_date = $req->input('todo_date');

        $task->save();

        return redirect()->route('task-data-one-shared', $id)->with('success', 'Task updated');
    }
    public function deleteTaskShared($id){
        Task::find($id)->delete();
        return redirect()->route('task-data-shared', $id)->with('success', 'Task deleted');
    }

    //========================================================================================

    public function allDataProcess(){
        $tasks = Task::where('owner', Auth::user()->email )->where('status','In the process')->get();
        return view('process-task', ['data' => $tasks]);
    }
    public function showOneTaskProcess($id){
        return view('one-taskProcess', ['data' => Task::find($id)]);
    }
    public function updateTaskProcess($id){
        return view('update-taskProcess', ['data' => Task::find($id)]);
    }
    public function  updateTaskSubmitProcess($id, TaskRequest $req){
        $task = Task::find($id);
        $task->name = $req->input('name');
        $task->owner = $req->input('owner');
        $task->description = $req->input('description');
        $task->status = $req->input('status');
        $task->todo_date = $req->input('todo_date');

        $task->save();

        return redirect()->route('task-data-one-process', $id)->with('success', 'Task updated');
    }
    public function deleteTaskProcess($id){
        Task::find($id)->delete();
        return redirect()->route('task-data-process', $id)->with('success', 'Task deleted');
    }


    //===========================================================================================
    
    public function allDataDone(){
        $tasks = Task::where('owner', Auth::user()->email )->where('status','Done')->get();
        return view('done-task', ['data' => $tasks]);
    }
    public function showOneTaskDone($id){
        return view('one-taskDone', ['data' => Task::find($id)]);
    }
    public function updateTaskDone($id){
        return view('update-taskDone', ['data' => Task::find($id)]);
    }
    public function  updateTaskSubmitDone($id, TaskRequest $req){
        $task = Task::find($id);
        $task->name = $req->input('name');
        $task->owner = $req->input('owner');
        $task->description = $req->input('description');
        $task->status = $req->input('status');
        $task->todo_date = $req->input('todo_date');

        $task->save();

        return redirect()->route('task-data-one-done', $id)->with('success', 'Task updated');
    }
    public function deleteTaskDone($id){
        Task::find($id)->delete();
        return redirect()->route('task-data-done', $id)->with('success', 'Task deleted');
    }
}

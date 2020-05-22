<?php

// vsya logika 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Model\Task;
use Telegram\Bot\Laravel\Facades\Telegram;
use Carbon\Carbon;

class TaskController extends Controller
{

    public function checkStatus()
    {
        $test=Task::all();

        $date= new Carbon(); //gets current time

        foreach($test as $task){

            $date1=strtotime($date);
            $date2=strtotime($task->todo_date);
            $sec=$date2-$date1;
            $days=$sec/86400;
            echo round($days);
            if($days<2){
                $text1 = "task: $task->name\n" . "description: $task->description\n" . "date: $task->todo_date\n";
    
                Telegram::sendMessage([
                    'chat_id'=>env('TELEGRAM_CHANEL_ID', '-1001208119694'),
                    'parse_mode'=>'HTML',
                    'text'=>$text1
                ]);
            } else {
              echo round($days);
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test=Task::all();

        $date= new Carbon(); //gets current time

        foreach($test as $task){

            $date1=strtotime($date);
            $date2=strtotime($task->todo_date);
            $sec=$date2-$date1;
            $days=$sec/86400;
            echo round($days);
            if($days<2){
                $text1 = "task: $task->name\n" . "description: $task->description\n" . "date: $task->todo_date\n";
    
            //     Telegram::sendMessage([
            //         'chat_id'=>env('TELEGRAM_CHANEL_ID', '-1001208119694'),
            //         'parse_mode'=>'HTML',
            //         'text'=>$text1
            //     ]);
            } else {
              echo round($days);
            }
        }

        // kogda uvedomlenie dolzhno otpravlyatsya v telegu
        
        //$test = Telegram::getUpdates();
        // Task is onject | method all zapihivaet vse v object classa task
         

        
         
        return view('tasks.index')->with('tasks',$test); 
        // frontend
        // method with , $task as tasks

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');  //view method is systemny
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request); //dump and die method
        // tokens is randomly generated avoiding CRF attack | keep securely cookies

        $this->validate($request,[
            'name'=>'required|string|max:255|min:5',
            'description'=>'required|string|max:1000|min:10',
            'todo_date'=>'required|date',
            'status'=>'string',
            'owner'=>'string',
        ]); //ubiraet liwnee, ostablyaet request

        $task = new Task;

        $task->name=$request->name;
        $task->description=$request->description;
        $task->todo_date=$request->todo_date;
        $task->status=$request->status;
        $task->owner=$request->owner;
        $task->save();

        return redirect()->route('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        // staticheski zapusk methoda find

        return view('tasks.edit')->with('task', $task);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name'=>'required|string|max:255|min:5',
            'description'=>'required|string|max:1000|min:10',
            'todo_date'=>'required|date'
        ]);
        
        $task = Task::find($id);

        $task->name=$request->name;
        $task->description=$request->description;
        $task->todo_date=$request->todo_date;

        $task->save();

        return redirect()->route('task.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task=Task::find($id);

        $task->delete();
        return redirect()->route('task.index');
    }
}

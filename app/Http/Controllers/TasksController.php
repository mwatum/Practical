<?php

namespace App\Http\Controllers;

use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::latest('updated_at')->paginate(10); 

     return view('Dashboard.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
                'title' => 'required|max:100', 
                'body' => 'required'
            ]);
        $task = new Task;
        $task->title = $request->title;
        $task->body = $request->body;
        $task->save();
        $request->session()->flash('msg-success', 'Task has been Added Successful');
        return redirect ('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $task = Task::findOrFail($task->id);
        return view('Dashboard.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $task = Task::findOrFail($task->id);
        return view ('Dashboard.tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
         $this->validate($request, [
                'title' => 'required|max:100', 
                'body' => 'required'
            ]);

        $task->title = $request->title;
        $task->body = $request->body;
        $task->save();
        $request->session()->flash('msg-success', 'Task has been Updated Successful');
        return redirect ('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Task $task)
    {
        $task = Task::findOrFail($task->id);
        $task->delete();

        $request->session()->flash('msg-success', 'Task has been Deleted Successful');

        return back();
    }

    public function completeStatus(Request $request, Task $task)
    {
        $task = Task::findOrFail($task->id);
        if($task->status == false){
            $task->status = true;
            $task->updated_at = Carbon::now();
            $task->save();

        $request->session()->flash('msg-success', 'Status has Complete Successful');

        return back();
        }else{

            $task->status = false;
            $task->updated_at = Carbon::now();
            $task->save();

        $request->session()->flash('msg-success', 'Status has Incomplete Successful');

        return back();

        }
    }
}

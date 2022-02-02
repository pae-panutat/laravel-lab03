<?php

namespace App\Http\Controllers;

use App\task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = Task::all();
        return view('task.index', compact('task', $task));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required'
        ]);

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect('/tasks/' . $task->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(task $task)
    {
        return view('task.show', compact('task', $task));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(task $task)
    {
        return view('task.edit', compact('task', $task));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, task $task)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required'
        ]);

        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();
        $request->session()->flash('message', 'SuccessFully Modify');
        return redirect('tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, task $task)
    {
        /* dd($task); */
        $task->delete();
        $request->session()->flash('message', 'SuccessFully Deleted');
        return redirect('tasks');
    }
}

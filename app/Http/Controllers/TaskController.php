<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $user = User::latest()->get();
        $task = Task::get();
        return view('user.task.index', compact('user', 'task'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->request->validate([
            'task' => 'required',
            'project' => 'required',
            'start_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        Task::create([
            'task' => $request->task,
            'project' => $request->project,
            'day' => $request->day,
            'user_id' => $request->user_id,
            'start_date' => \Carbon\Carbon::createFromFormat('l, d F Y', $request->start_date),
            'start_time' => \Carbon\Carbon::createFromFormat('h:i a', $request->start_time),
            'end_time' => \Carbon\Carbon::createFromFormat('h:i a', $request->start_time),
            'status' => 'Open'
        ]);

        Alert::success('Success', 'Data has been submitted!');
        return redirect()->back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

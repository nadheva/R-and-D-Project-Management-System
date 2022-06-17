<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
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
        $task = Task::orderBy('start_time', 'DESC')->get();
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
        // $this->request->validate([
        //     'task' => 'required',
        //     'project' => 'required',
        //     'start_date' => 'required',
        //     'start_time' => 'required',
        //     'end_time' => 'required'
        // ]);

        $task =Task::create([
                    'task' => $request->task,
                    'project' => $request->project,
                    'day' => $request->day,
                    'user_id' => $request->user_id,
                    'start_date' => \Carbon\Carbon::createFromFormat('Y-m-d', $request->start_date),
                    'start_time' => \Carbon\Carbon::createFromFormat('H:i', $request->start_time),
                    'end_time' => \Carbon\Carbon::createFromFormat('H:i', $request->end_time),
                    'status' => 'Open'
                ]);

        Mail::send('user.mail.task', compact('task'), function ($message) use($task) {
            $message->from('no-reply.taskmonitoring@gmail.com');
            $message->to($task->user->email, 'R&D Task Activity')
            ->subject("New Task [Loading Allocation] From R&D");
        });

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
        $task = Task::findOrfail($id);
        $task->task = $request->task;
        $task->project = $request->project;
        $task->day = $request->day;
        $task->user_id = $request->user_id;
        $task->start_date = $request->start_date;
        $task->start_time = $request->start_time;
        $task->end_time = $request->end_time;
        $task->status = $request->status;
        $task->save();

        Alert::info('Info', 'Data has been updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::findOrfail($id)->delete();
        Alert::warning('Warning', 'Data has been deleted!');
        return redirect()->back();
    }
}

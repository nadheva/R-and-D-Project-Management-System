<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\RIO;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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
        if(Auth::user()->role == 'admin'){
            $task = Task::where('user_id',Auth::user()->id)->get();
            $rio = RIO::where('user_id', Auth::user()->id)->get();

            //number_of_task
            $task_count = Task::where('user_id',Auth::user()->id)->count();
            $rio_count = RIO::where('user_id', Auth::user()->id)->count();
            $number_of_task = $task_count + $rio_count;

            //number_of_open_task
            $open_task_count = Task::where('user_id',Auth::user()->id)->where('status', '=', 'Open')->count();
            $open_rio_count = RIO::where('user_id', Auth::user()->id)->where('status', '=', 'Open')->count();
            $number_of_open_task = $open_task_count + $open_rio_count;

            //number_of_complete_task
            $complete_task_count = Task::where('user_id',Auth::user()->id)->where('status', '=', 'Done')->count();
            $complete_rio_count = RIO::where('user_id', Auth::user()->id)->where('status', '=', 'Done')->count();
            $number_of_complete_task = $complete_task_count + $complete_rio_count;

            //user_performance_dashboard
            $user = User::latest()->get();
            return view('user.dashboard.index', compact('task', 'rio', 'number_of_task', 'number_of_open_task', 'number_of_complete_task', 'user'));
        }
        elseif(Auth::user()->role == 'user'){
            $task = Task::where('user_id',Auth::user()->id)->get();
            $rio = RIO::where('user_id', Auth::user()->id)->get();

            //number_of_task
            $task_count = Task::where('user_id',Auth::user()->id)->count();
            $rio_count = RIO::where('user_id', Auth::user()->id)->count();
            $number_of_task = $task_count + $rio_count;

            //number_of_open_task
            $open_task_count = Task::where('user_id',Auth::user()->id)->where('status', '=', 'Open')->count();
            $open_rio_count = RIO::where('user_id', Auth::user()->id)->where('status', '=', 'Open')->count();
            $number_of_open_task = $open_task_count + $open_rio_count;

            //number_of_complete_task
            $complete_task_count = Task::where('user_id',Auth::user()->id)->where('status', '=', 'Done')->count();
            $complete_rio_count = RIO::where('user_id', Auth::user()->id)->where('status', '=', 'Done')->count();
            $number_of_complete_task = $complete_task_count + $complete_rio_count;

            //user_performance_dashboard
            $user = User::latest()->get();
            return view('user.dashboard.index', compact('task', 'rio', 'number_of_task', 'number_of_open_task', 'number_of_complete_task', 'user'));
        }
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
        //
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Project;

class ProjectController extends Controller
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
        $project = Project::latest()->get();
        return view('user.project.index', compact('project'));
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
        $request->validate([
            'model_id' => 'required',
            'item_id' => 'required',
            'user_id' => 'required',
            'remark' => 'required',
            'status' => 'required'
        ]);

        Project::create([
            'model_id' => $request->model_id,
            'item_id' => $request->item_id,
            'user_id' => $request->user_id,
            'remark' => $request->remark,
            'staus' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrfail($id);
        return view('user.project.index', compact('project'));
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
        $project = Project::findOrfail($id);
        $project->model_id = $request->model_id;
        $project->item_id = $request->item_id;
        $project->user_id = $request->user_id;
        $project->remark = $request->remark;
        $project->status = $request->status;
        $project->save();

        return redirect()->back()->with('info', 'Edited');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrfail($id)->delete();
        return redirect()->back()->with('warning', 'Deleted!');
    }
}
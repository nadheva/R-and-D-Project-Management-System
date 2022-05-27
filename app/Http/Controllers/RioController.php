<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RIO;
use App\Models\User;
use App\Models\ModelProduct;

class RioController extends Controller
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
        $rio = RIO::all();
        $model = ModelProduct::latest()->get();
        $user = User::latest()->get();
        return view('user.rio.index', compact('rio', 'model', 'user'));
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
            'issue' => 'required',
            'detail' => 'required',
            'action' => 'required',
            'user_id' => 'required',
            'due_date' => 'required',
            'status' => 'required'
        ]);

        RIO::create([
            'model_id' => $request->model_id,
            'issue' => $request->issue,
            'detail' => $request->detail,
            'action' => $request->action,
            'user_id' => $request->user_id,
            'due_date' => $request->due_date,
            'status' => 'Open',
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
        $rio = RIO::findOrfail($id);
        return view('user.rio.view', compact('rio'));
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
        $rio = RIO::findOrfail($id);
        $rio->model_id = $request->model_id;
        $rio->issue = $request->issue;
        $rio->detail = $request->detail;
        $rio->action = $request->action;
        $rio->user_id = $request->user_id;
        $rio->due_date = $request->due_date;
        $rio->status = $request->status;
        $rio->save();

        return redirect()->back()->with('info', 'Edited!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rio = RIO::findOrfail($id)->delete();
        return redirect()->back()->with('warning', 'Deleted!');

    }
}

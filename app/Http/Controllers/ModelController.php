<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelProduct;

class ModelController extends Controller
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
        $model = Model::all();
        return view('user.model.index', compact('model'));
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
            'name' => 'required',
            'description' => 'required',
        ]);

        if (isset($request->image)) {
            $extention = $request->image->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/model/". $file_name;
            $request->image->storeAs('public/model', $file_name);
        } else {
            $file_name = null;
        }

        ModelProduct::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $$txt
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = ModelProduct::findOrfail($id);
        return view('user.model.show', compact('model'));
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
        $model = ModelProduct::findOrfail($id);
        $model->name = $request->name;
        $model->description = $request->description;
        if (isset($request->image)) {
            $extention = $request->image->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/model/". $file_name;
            $request->image->storeAs('public/model', $file_name);
            $model->image = $txt;
        } else {
            $file_name = null;
        }

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
        $model = ModelProduct::findOrfail($id)->delete();
        return redirect()->back()->with('warning', 'Deleted!');
    }
}

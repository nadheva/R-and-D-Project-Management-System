<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ModelProduct;
use App\Models\User;
use App\Models\Item;
use App\Models\Sub_item;

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
        $model = ModelProduct::latest()->get();
        $item = Item::latest()->get();
        $user = User::all();
        $sub_item = Sub_item::all();
        return view('user.project.index', compact('project', 'model', 'user', 'item', 'sub_item'));
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
        // $request->validate([
        //     'model_id' => 'required',
        //     'item_id' => 'required',
        //     'user_id' => 'required',
        //     'remark' => 'required',
        //     'status' => 'required'
        // ]);
        $sub_item = $request->sub_item_id;
        if($sub_item){
            $i = 0;
            foreach ($sub_item as $item) {
                // dd($item);
                $dataa[$i] = ([
                    'id' => (int) $item,
                ]);
                $i++;
            }
        } else {
            $dataa = [];
        }

        Project::create([
            'model_id' => $request->model_id,
            'item_id' => $request->item_id,
            'user_id' => $request->user_id,
            'remark' => $request->remark,
            'staus' => 'Open',
            'sub_item_id' => $dataa
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
        $sub_item = $request->sub_item_id;
        if($sub_item){
            $i = 0;
            foreach ($sub_item as $item) {
                // dd($item);
                $dataa[$i] = ([
                    'id' => (int) $item,
                ]);
                $i++;
            }
        } else {
            $dataa = [];
        }

        $project = Project::findOrfail($id);
        $project->model_id = $request->model_id;
        $project->item_id = $request->item_id;
        $project->user_id = $request->user_id;
        $project->remark = $request->remark;
        $project->status = $request->status;
        $project->sub_item_id = $dataa;
        $project->save();
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
        $project = Project::findOrfail($id)->delete();
        Alert::warning('Warning', 'Data has been deleted!');
        return redirect()->back();
    }
}

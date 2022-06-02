<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sub_item;
use App\Models\Item;

class SubItemController extends Controller
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
        $sub_item = Sub_item::latest()->get();
        $item = Item::get();
        return view('user.sub-item.index', compact('sub_item', 'item'));
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
            // 'item_id' => 'required'
        ]);

        Sub_item::create([
            'name' => $request->name,
            'description' => $request->description,
            // 'item_id' => $request->item_id
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
        $sub_item = Sub_item::findOrfail($id);
        return view('user.sub-item.index', compact('sub_item'));
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
        $sub_item = Sub_item::findOrfail($id);
        $sub_item->name = $request->name;
        $sub_item->description = $request->description;
        // $sub_item->item_id = $request->item_id;
        $sub_item->save();
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
        $sub_item = Sub_item::findOrfail($id)->delete();
        Alert::warning('Warning', 'Data has been deleted!');
        return redirect()->back();
    }
}

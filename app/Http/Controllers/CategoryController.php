<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = category::all();
        return view('admin.category.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = new category();
        $data->cat_title = $request->category;
        $data->save();
        return redirect()->back()->with('message','category added successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datas = category::find($id);
        return view('admin.category.edit',compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = category::find($id);
        $data->cat_title = $request->category;
        $data->update();
        return redirect('/category')->with('message','category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $data = category::find($id);
       $data->delete();
       return redirect()->back()->with('message','category Deleted successfully');
    }
}

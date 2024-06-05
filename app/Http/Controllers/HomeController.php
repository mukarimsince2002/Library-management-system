<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas=Book::all();
        return view('home.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function book_history()
    {
        if (Auth::id()) {
            $user_id = Auth::user()->id;

        $datas=Borrow::where('user_id','=',$user_id)->get();
        return view('home.book_history',compact('datas'));
    }
}

    /**
     * Store a newly created resource in storage.
     */
    public function explore()
    {   $datas = Book::all();
        $category = category::all();
        return view('home.explore',compact('datas','category'));
    }

    /*
     * Display the specified resource.
     */
    public function cancel_req(string $id)
    {
        $data = Borrow::find($id);
        $data->delete();


        return redirect()->back()->with('message','book borrow request is cancelled');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function search(Request $request)
    {
        $category = category::all();
        $search = $request->search;
        $datas = Book::where('title','LIKE','%'.$search.'%')->orwhere('author','LIKE','%'.$search.'%')->get();
        return view('home.explore',compact('datas','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function category(string $id)
    {
        $category = category::all();
        $datas = Book::where('category_id',$id)->get();
        return view('home.explore',compact('datas','category'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

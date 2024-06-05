<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\category;
use Illuminate\Http\Request;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = book::all();
        return view('admin.book.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $datas = category::all();
        return view('admin.book.add' , compact('datas'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new book();
        $data->title = $request->book_name;
        $data->author = $request->author_name;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->description = $request->description;
        $data->category_id = $request->category;
        $book_image = $request->book_img;
        $author_image = $request->author_img;
        if ($book_image) {
            $book_image_name = time().'.'.$book_image->getClientOriginalExtension();
            $request->book_img->move('book',$book_image_name);
            $data->book_img = $book_image_name;
        }
        if ($author_image) {
            $author_image_name = time().'.'.$author_image->getClientOriginalExtension();
            $request->author_img->move('author',$author_image_name);
            $data->author_img = $author_image_name;
        }
        $data->save();
        return redirect()->back()->with('message','book added successfully');
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
        $data = book::find($id);
        $cat_datas = category::all();
        return view('admin.book.edit',compact('data','cat_datas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = book::find($id);
        $data->title = $request->book_name;
        $data->author = $request->author_name;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->description = $request->description;
        $data->category_id = $request->category;
        $book_image = $request->book_img;
        $author_image = $request->author_img;
        if ($book_image) {
            $book_image_name = time().'.'.$book_image->getClientOriginalExtension();
            $request->book_img->move('book',$book_image_name);
            $data->book_img = $book_image_name;
        }
        if ($author_image) {
            $author_image_name = time().'.'.$author_image->getClientOriginalExtension();
            $request->author_img->move('author',$author_image_name);
            $data->author_img = $author_image_name;
        }
        $data->update();
        return redirect('/book')->with('message','book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $data = book::find($id);
       $data->delete();
       return redirect()->back()->with('message','book Deleted successfully');
    }
}

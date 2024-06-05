<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Borrow::all();
        return view('admin.borrow.request',compact('datas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function approve(Request $request, string $id)
    {
        $data = Borrow::find($id);
        $status = $data->status;
        if ($status == "Approved") {
            return redirect()->back();
        }
        else{
        $data->status = 'Approved';
        $data->save();

        $bookid = $data->book_id;
        $book = Book::find($bookid);
        $book_qty = $book->quantity - 1;
        $book->quantity = $book_qty;

        $book->save();

        return redirect()->back();
        }
    }
    public function reject(Request $request, string $id)
    {
        $data = Borrow::find($id);
        $status = $data->status;
        if ($status == "Rejected") {
            return redirect()->back();

        }
        else{
            $data->status = 'Rejected';
        $data->save();
        return redirect()->back();
 }
    }
    public function return(Request $request, string $id)
    {
        $data = Borrow::find($id);
        $status = $data->status;
        if ($status == "Returned") {
            return redirect()->back();
        }
        else{
        $data->status = 'Returned';
        $data->save();

        $bookid = $data->book_id;
        $book = Book::find($bookid);
        $book_qty = $book->quantity + 1;
        $book->quantity = $book_qty;

        $book->save();

        return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

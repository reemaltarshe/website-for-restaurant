<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $bookings = Book::oldest()->get();
        return view('admin.books.index', compact('bookings'));
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
    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'تم حذف طلب الحجز بنجاح وتحديث الجدول!');
    }

    public function updateStatus(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $book = Book::findOrFail($id);
        $book->update([
            'status' => $request->status
        ]);


        try {
            \Illuminate\Support\Facades\Mail::to($book->email)->send(new \App\Mail\BookingStatusMail($book));
        } catch (\Exception $e) {
        }

        return redirect()->back()->with('success', 'تم تحديث حالة الحجز بنجاح وإرسال البريد الإلكتروني للزبون! ✉️');
    }
}

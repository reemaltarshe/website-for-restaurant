<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class FrontendBookController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email',
            'phone_number' => 'required|string',
            'chairs'       => 'required|integer|min:1',
            'date'         => 'required|date',
        ]);


        $todayDate = date('Y-m-d');
        $userDate  = date('Y-m-d', strtotime($request->date));

        if ($userDate < $todayDate) {

            $errorMessage = app()->getLocale() == 'ar'
                ? 'التاريخ غير صالح، لا يمكن تحديد يوم يسبق تاريخ اليوم!'
                : 'The date must be today or a future date!';

            return redirect()->back()->withInput()->withErrors(['date' => $errorMessage]);
        }


        $book = Book::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'phone_number' => $request->phone_number,
            'chairs'       => $request->chairs,
            'date'         => $request->date,
            'status'       => 'pending',
        ]);

        event(new \App\Events\BookingCreated($book));

        $successMessage = app()->getLocale() == 'ar'
            ? 'تم استلام طلب حجزك بنجاح! يرجى انتظار تأكيد الإدارة.'
            : 'Your booking request has been received successfully! Please wait for admin approval.';

        return redirect()->back()->with('success', $successMessage);
    }
}

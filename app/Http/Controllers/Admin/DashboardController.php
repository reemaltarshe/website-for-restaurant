<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Book;
use App\Models\User;


class DashboardController extends Controller
{
    public function index()
    {

        $productsCount = Product::count();
        $booksCount = Book::count();
        $usersCount = User::count();


        $usersByMonth = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('count', 'month')
            ->toArray();


        $monthsData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthsData[] = $usersByMonth[$i] ?? 0;
        }
        $pendingBooks  = Book::where('status', 'pending')->count();
        $approvedBooks = Book::where('status', 'approved')->count();
        $rejectedBooks = Book::where('status', 'rejected')->count();

        $approvedBookingsList = Book::where('status', 'approved')->get();

        $totalEarnings = $approvedBooks * 50;

        return view('admin.dashboard', compact(
            'productsCount',
            'booksCount',
            'usersCount',
            'monthsData',
            'pendingBooks',
            'approvedBooks',
            'rejectedBooks',
            'totalEarnings',
            'approvedBookingsList'
        ));
    }
}

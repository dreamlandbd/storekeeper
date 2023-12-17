<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductSales;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function show()
    {
        $today = Carbon::now()->format('Y-m-d');
        $yesterday = Carbon::yesterday()->format('Y-m-d');
        $thisMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
        $lastMonth = Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d');

        $salesToday = DB::table('products_sales')->whereDate('created_at', $today)->count();

        $salesYesterday = DB::table('products_sales')->whereDate('created_at', $yesterday)->count();
        $salesThisMonth = DB::table('products_sales')->whereDate('created_at', '>=', $thisMonth)->count();
        $salesLastMonth = DB::table('products_sales')->whereDate('created_at', '>=', $lastMonth)->whereDate('created_at', '<', $thisMonth)->count();

        return view('dashboard', compact('salesToday', 'salesYesterday', 'salesThisMonth', 'salesLastMonth'));
    }

    public function showTransactionHistory()
    {
        $transactions = DB::table('products_sales')->orderBy('created_at', 'desc')->paginate(10);
        return view('transaction_history', compact('transactions'));
    }
}


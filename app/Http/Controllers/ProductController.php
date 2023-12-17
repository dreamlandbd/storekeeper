<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function showForm()
    {
        return view('products.form');
    }

    public function index()
    {
        $products = DB::table('products')->get();
        return view('products.index', compact('products'));
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('product');
    }

    public function sellProduct($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        if ($product === null)
            throw new \Exception('Product not found');

        return view('products.sale', compact('product'));
    }

    public function sell(Request $request)
    {
        $product = DB::table('products')->where('id', $request->id)->first();
        $q = $product->quantity - $request->quantity;
        $product = DB::table('products')->where('id', $request->id)
            ->update(['quantity' => $q, "updated_at" => \Carbon\Carbon::now()]);

        DB::table('products_sales')->upsert([
            ['name' => $request->name,
                'quantity' => $request->quantity,
                'price' => $request->price,
                "created_at" => \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()]
        ], $request->id);
        return redirect()->route('dashboard');
    }
}


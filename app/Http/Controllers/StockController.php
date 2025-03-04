<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::with('product')->get();
        return view('stocks.index', compact('stocks'));
    }

    public function create()
    {
        $products = Product::all();
        return view('stocks.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'type' => 'required|in:in,out',
        ]);

        Stock::create($validated);
        return redirect()->route('stocks.index')->with('success', 'Stock entry created successfully!');
    }

    public function edit($id)
{
    $stock = Stock::findOrFail($id);
    $products = Product::all(); // If stock is linked to products
    return view('stocks.edit', compact('stock', 'products'));
}


public function update(Request $request, $id)
{
    $validated = $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:0',
    ]);

    $stock = Stock::findOrFail($id);
    $stock->update([
        'product_id' => $validated['product_id'],
        'quantity' => $validated['quantity'],
    ]);

    return redirect()->route('stocks.index')->with('success', 'Stock updated successfully!');
}
    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stocks.index')->with('success', 'Stock deleted successfully!');
    }
}


<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    // Method to display the products page with stock details
    public function index()
    {
        // Retrieve all products and include their relationships (category, supplier, warehouse, stock)
        $products = Product::with('category', 'supplier', 'warehouse', 'stock')->get();

        // Pass the products to the view (which is /view/history/index)
        return view('history.index', compact('products'));
    }

    // Generate PDF for a specific product and its stock details
    public function generateProductAndStockPdf($productId, $stockType)
    {
        // Retrieve the product details
        $product = Product::with('category', 'supplier', 'warehouse')->findOrFail($productId);

        // Retrieve the latest stock update (stock in or stock out) for the product
        $stock = Stock::where('product_id', $productId)
                    ->where('type', $stockType)  // Filtering by type (in or out)
                    ->latest()
                    ->first();

        if (!$stock) {
            return redirect()->route('stocks.index')->with('error', 'No stock update found!');
        }

        // Prepare data for the PDF view
        $data = [
            'product' => $product,
            'category' => $product->category->category_name ?? 'N/A',
            'supplier' => $product->supplier->name ?? 'N/A',
            'warehouse' => $product->warehouse->warehouse_name ?? 'N/A',
            'created_at' => $product->created_at->format('d M Y'),
            'stock' => $stock,
            'quantity' => $stock->quantity,
            'price' => $stock->price,
            'stock_type' => ucfirst($stockType),
            'stock_date' => $stock->created_at->format('d M Y'),
        ];

        // Load the view and generate the PDF
        $pdf = PDF::loadView('pdf.product_and_stock', $data);

        // Return the generated PDF for download
        return $pdf->download('product_and_stock_' . $product->product_code . '.pdf');
    }
}






<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Category;
use App\Models\Warehouse;
use App\Models\Shelf;
use App\Models\Rack;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
{
    $categories = Category::all();
    $racks = Rack::all();
    $shelves = Shelf::all();
    
    return view('products.create', compact('categories','racks', 'shelves'));
}
public function store(Request $request)
{
    $validated = $request->validate([
        'product_code' => 'required|unique:products|max:255',
        'product_name' => 'required',
        'category_id' => 'required|exists:categories,id',
        'warehouse_id' => 'required|exists:warehouses,id',
        'purchase_price' => 'required|numeric',
        'sale_price' => 'required|numeric',
        'product_date' => 'required|date',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Validate image
    ]);

    $warehouse = Warehouse::find($validated['warehouse_id']);

    // Handle image upload
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('product_images', 'public');
    }

    Product::create([
        'product_code' => $validated['product_code'],
        'product_name' => $validated['product_name'],
        'category_id' => $validated['category_id'],
        'warehouse_id' => $validated['warehouse_id'],
        'warehouse_name' => $warehouse->warehouse_name,
        'purchase_price' => $validated['purchase_price'],
        'sale_price' => $validated['sale_price'],
        'date_in' => $validated['product_date'],
        'image' => $imagePath,
        'rack_id' => $request->rack_id,
        'shelf_id' => $request->shelf_id,  // Save image path
    ]);

    return redirect()->route('products.index')->with('success', 'Product added successfully!');
}

public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all();
    $racks = Rack::all();
    $shelves = Shelf::all();
    
    return view('products.edit', compact('product', 'categories', 'racks', 'shelves'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'product_code' => 'required|max:255',
        'product_name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'rack_id' => 'required|exists:racks,id',
        'shelf_id' => 'required|exists:shelves,id',
        'purchase_price' => 'required|numeric',
        'sale_price' => 'required|numeric',
        'date_in' => 'required|date',
    ]);

    $product = Product::findOrFail($id);
    $product->update([
        'product_code' => $validated['product_code'],
        'product_name' => $validated['product_name'],
        'category_id' => $validated['category_id'],
        'rack_id' => $validated['rack_id'],
        'shelf_id' => $validated['shelf_id'],
        'purchase_price' => $validated['purchase_price'],
        'sale_price' => $validated['sale_price'],
        'date_in' => $validated['date_in'],
    ]);

    return redirect()->route('products.index')->with('success', 'Product updated successfully!');
}



    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
    public function showQrCode($id)
{
    $product = Product::with('warehouse', 'stock')->findOrFail($id);
    $category = Category::find($product->category_id, );
    $warehouseName = $product->warehouse->warehouse_name ?? 'N/A'; // Fetch category using the model

    // Prepare the product details as text
    $productDetails = "Product Name: " . $product->product_name . "\n" .
                      "Product Code: " . $product->product_code . "\n" .
                      "Category: " . ($category ? $category->category_name : 'N/A') . "\n" .
                      "Warehouse: " . $warehouseName . "\n".
                      "Stock Quantity: " . ($product->stock->quantity ?? '0') . "\n" .
                      "Purchase Price: Rp " . number_format($product->purchase_price, 0, ',', '.') . "\n" .
                      "Sale Price: Rp " . number_format($product->sale_price, 0, ',', '.') . "\n" .
                      "Date Added: " . $product->created_at->format('d M Y');

    // Generate QR code with product details
    $qrCode = QrCode::size(300)->generate($productDetails);

    return view('products.qrcode', compact('product', 'qrCode'));
}
public function showDetails($id)
{
    $product = Product::with('category', 'warehouse', 'stock')->findOrFail($id);

    return view('products.details', compact('product'));
}

}

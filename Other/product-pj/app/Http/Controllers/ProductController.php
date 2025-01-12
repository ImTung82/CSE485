<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // // Không phân trang
        // $products = Product::all();
        // return view("products.index", compact("products"));

        // // Có phân trang: Sử dụng paginate thay vì all()
        $products = Product::paginate(10); // Lấy 5 bản ghi mỗi trang
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate ảnh
        ]);
        
        if ($request->hasFile('image')) {
        // Lưu ảnh vào thư mục 'storage/app/public/images'
            $imagePath = $request->file('image')->store('images', 'public');
        }
    
        // Tạo sản phẩm mới
        Product::create([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath, // Lưu đường dẫn ảnh
            'category_name' => $request->category_name,
        ]);
    
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }
   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_name' => 'required|string|max:255',
        ]);
    
        $product = Product::findOrFail($id);

        // Khởi tạo biến $imagePath và gán giá trị ảnh cũ nếu không có ảnh mới
        $imagePath = $product->image;
    
        if ($request->hasFile('image')) {
            // Lưu ảnh mới
            $imagePath = $request->file('image')->store('images', 'public');
        }
    
        // Cập nhật các thông tin khác
        $product->update([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'category_name' => $request->category_name,
        ]);
    
        return redirect()->route('products.index')->with('success', 'Product edit successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
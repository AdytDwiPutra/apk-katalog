<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.products.index');
    }

    public function getProducts()
    {
        $products = Product::with(['category', 'brand', 'images'])
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }

    public function getCategories()
    {
        $categories = Category::all();

        return response()->json([
            'success' => true,
            'data' => $categories
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id = null;
        $categories = Category::all();
        $brands = Brand::all();
        return view('content.products.form', compact('id', 'categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // 2. Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        
        DB::beginTransaction(); // mulai transaction

        try {
            // 2. Simpan data produk
            $product = new Product();
            $product->name = $request->name;
            $product->slug = Str::slug($request->name) . '-' . Str::random(5);
            $product->sku = $request->sku;
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->stock = $request->stock ?? 0;
            $product->status = $request->status ?? 'draft';
            $product->is_featured = $request->has('is_featured') ? true : false;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->save();

            // 3. Upload dan simpan gambar
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $imageName = time() . '_' . Str::random(5) . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads/products'), $imageName);

                    ProductImage::create([
                        'product_id' => $product->id,
                        'path' => 'uploads/products/' . $imageName,
                    ]);
                }
            }

            DB::commit(); // commit jika semua berhasil

            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil ditambahkan',
                'data' => $product
            ]);

        } catch (\Exception $e) {
            DB::rollBack(); // rollback jika ada error

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function searchProducts(Request $request)
    {
        $query = $request->input('query');
        $category = $request->input('category');

        // mulai query builder dasar
        $products = Product::query()
            ->with(['category', 'brand', 'images']);

        // filter berdasarkan keyword (jika ada)
        if (!empty($query)) {
            $products->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%");
            });
        }

        // filter berdasarkan kategori (jika ada)
        if (!empty($category) && $category !== 'all') {
            $products->whereHas('category', function ($q) use ($category) {
                $q->where('id', $category)
                ->orWhere('slug', $category)
                ->orWhere('name', 'LIKE', "%{$category}%");
            });
        }

        // ambil hasil (batasi misal 20 biar ringan)
        $results = $products->take(20)->get();

        return response()->json([
            'success' => true,
            'data' => $results,
        ]);
    }
}

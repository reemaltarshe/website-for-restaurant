<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0|lt:price',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }



        Product::create([
            'name'  => $request->name,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'image' => $imageName,
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'تم إضافة الوجبة الجديدة بنجاح !');
    }


    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }



    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0|lt:price',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
        ]);


        $imageName = $product->image;


        if ($request->hasFile('image')) {

            $oldImagePath = public_path('images/' . $product->image);
            if (file_exists($oldImagePath) && !empty($product->image)) {
                @unlink($oldImagePath);
            }


            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }


        $product->update([
            'name'        => $request->name,
            'price'       => $request->price,
            'discount_price' => $request->discount_price,
            'image'       => $imageName,
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'تم تحديث بيانات الوجبة بنجاح !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        $imagePath = public_path('images/' . $product->image);
        if (file_exists($imagePath) && !empty($product->image)) {
            @unlink($imagePath);
        }


        $product->delete();


        return redirect()->route('admin.products.index')->with('success', 'تم حذف الوجبة بنجاح وتحديث القائمة!');
    }
}

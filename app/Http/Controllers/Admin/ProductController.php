<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('image')->store('products', ['disk' => 'public']);

        $product = Product::create([
            'category_id'         => $request->get('category_id'),
            'name'                => $request->get('name'),
            'slug'                => str_slug($request->get('name')),
            'price'               => $request->get('price'),
            'discount_percentage' => $request->get('discount_percentage'),
            'image'               => $path,
            'size'                => $request->get('size'),
            'color'               => $request->get('color')
        ]);

        foreach ($request->file('images') as $image) {
            $path = $image->store('products', ['disk' => 'public']);
            ProductImage::create([
                'product_id' => $product->id,
                'path'       => $path
            ]);
        }

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $path = $request->file('image')->store('products', ['disk' => 'public']);

        $product->category_id = $request->get('category_id') ?? null;
        $product->name = $request->get('name');
        $product->slug = str_slug($request->get('name'));
        $product->price = $request->get('price');
        $product->discount_percentage = $request->get('discount_percentage');
        $product->image = $path;
        $product->size = $request->get('size');
        $product->color = $request->get('color');
        $product->save();

        ProductImage::where('product_id', $id)->delete();

        foreach ($request->file('images') as $image) {
            $path = $image->store('products', ['disk' => 'public']);
            ProductImage::create([
                'product_id' => $product->id,
                'path'       => $path
            ]);
        }

        return redirect()->route('product.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index');
    }
}

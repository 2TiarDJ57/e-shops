<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();

        return view('index_product', [
            'products' => $products,
            'title' => 'Products'
        ]);
    }

    public function show(Product $product)
    {

        return view('detail_product', [
            'product' => $product,
            'title' => 'Products'
        ]);
    }

    public function create_product()
    {
        return view('create_product', [
            'title' => 'Products'
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
            'stock' => 'required'
        ]);

        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $path,
            'stock' => $request->stock
        ]);

        return Redirect::route('index.products');
    }

    public function edit(Product $product)
    {
        return view('edit_product', [
            'product' => $product,
            'title' => 'Products'
        ]);
    }

    public function update(Product $product, Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
            'stock' => 'required'
        ]);

        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $path,
            'stock' => $request->stock
        ]);

        return redirect(route('show.product', $product))->with('success', 'Berhasil menambahkan data');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect(route('index.products'));
    }
}

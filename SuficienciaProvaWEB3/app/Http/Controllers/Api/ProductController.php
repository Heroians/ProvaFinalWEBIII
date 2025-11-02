<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function index()
    {
        return Product::with('category')->get();
    }

    public function show(Product $product)
    {
        return $product->load('category');
    }

    public function store(Request $request)
    {
        Gate::authorize('manage-products');

        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        return Product::create($data);
    }

    public function update(Request $request, Product $product)
    {
        Gate::authorize('manage-products');

        $product->update($request->all());
        return $product;
    }

    public function destroy(Product $product)
    {
        Gate::authorize('manage-products');

        $product->delete();
        return response()->json(['message' => 'Produto removido com sucesso']);
    }
}

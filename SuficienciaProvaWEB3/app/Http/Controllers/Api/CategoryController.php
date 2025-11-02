<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function show(Category $category)
    {
        return $category;
    }

    public function store(Request $request)
    {
        Gate::authorize('manage-categories');

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        return Category::create($data);
    }

    public function update(Request $request, Category $category)
    {
        Gate::authorize('manage-categories');

        $category->update($request->all());
        return $category;
    }

    public function destroy(Category $category)
    {
        Gate::authorize('manage-categories');

        $category->delete();
        return response()->json(['message' => 'Categoria removida com sucesso']);
    }
}

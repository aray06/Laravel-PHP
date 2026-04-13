<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category; // Добавили импорт модели
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Показываем все категории
     */
    public function index()
    {
        return response()->json(Category::all(), 200);
    }

    /**
     * Создаем новую категорию
     */
    public function store(Request $request)
    {
        // Создаем запись в базе данных
        $category = Category::create([
            'name' => $request->name
        ]);

        // Возвращаем JSON и статус 201 (Успешно создано)
        return response()->json($category, 201);
    }

    public function show(Category $category)
    {
        return response()->json($category, 200);
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return response()->json($category, 200);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(null, 204);
    }
    public function getByProduct($productId)
    {
        $product = \App\Models\Product::with('categories')->find($productId);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product->categories, 200);
    }
}

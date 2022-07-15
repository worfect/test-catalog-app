<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

final class CategoryController extends Controller
{
    public function index(Category $category): View
    {
        return view('category.list')->with(['categories' => $category->all()]);
    }

    public function edit(Category $category): View
    {
        return view('category.edit')->with(['category' => $category]);
    }

    public function create(): View
    {
        return view('category.create');
    }

    public function store(Category $category, StoreCategoryRequest $request): RedirectResponse
    {
        $category->create([
            'title' => $request->get('title'),
        ]);

        return redirect()->route('category.index');
    }

    public function update(Category $category, UpdateCategoryRequest $request): RedirectResponse
    {
        $category->update(['title' => $request->get('title')]);

        return redirect()->route('category.index');
    }

    public function remove(Category $category): JsonResponse
    {
        if ($category->materials()->exists()) {
            return response()->json([
                'error' => true,
                'message' => 'Невозможно удалить',
            ], 403);
        }

        $category->delete();
        return response()->json();
    }
}

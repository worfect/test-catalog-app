<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index(Category $category): View
    {
        return view('list.category')->with(['categories' => $category->all()]);
    }

    public function edit(Category $category, string $id): View
    {
        return view('edit.category')->with(['category' => $category->find($id)]);
    }

    public function create(): View
    {
        return view('create.category');
    }

    public function store(Category $category, StoreCategoryRequest $request): RedirectResponse
    {
        $category->create([
            'title' => $request->get('title'),
        ]);

        return redirect()->route('category.index');
    }

    public function update(Category $category, UpdateCategoryRequest $request, string $id): RedirectResponse
    {
        $category->where('id', $id)
            ->update(['title' => $request->get('title')]);

        return redirect()->route('category.index');
    }

    public function remove(Category $category, string $id): never
    {
//        Что делать с обязательной привязкой к материалу?

//        $category->find($id)->delete();
//
//        return redirect()->back();

        abort(404);
    }
}

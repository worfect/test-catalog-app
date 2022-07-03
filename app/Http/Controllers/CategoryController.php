<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view('list.category')->with(['categories' => $category->all()]);
    }

    public function edit(Category $category, $id)
    {
        return view('edit.category')->with(['category' => $category->find($id)]);
    }

    public function create()
    {
        return view('create.category');
    }

    public function store(Category $category, StoreCategoryRequest $request)
    {
        $category->create([
            'title' => $request->get('title'),
        ]);

        return redirect()->route('category.index');
    }

    public function update(Category $category, UpdateCategoryRequest $request, $id)
    {
        $category->where('id', $id)
            ->update(['title' => $request->get('title')]);

        return redirect()->route('category.index');
    }

    public function remove(Category $category, $id)
    {
//        Что делать с обязательной привязкой к материалу?

//        $category->find($id)->delete();
//
//        return redirect()->back();
    }
}

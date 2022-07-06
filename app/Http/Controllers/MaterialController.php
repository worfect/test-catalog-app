<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;
use App\Models\Category;
use App\Models\Material;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class MaterialController extends Controller
{
    public function index(Material $material, Request $request): View
    {
        $request->flash();

        $searchQuery = (string) $request->get('search-query');

        if ($searchQuery === '') {
            return view('list.material')->with(['materials' => $material->all()]);
        }

        $result = $material
            ->where('title', 'ILIKE', "%{$searchQuery}%")
            ->orWhere('author', 'ILIKE', "%{$searchQuery}%")
            ->orWhereHas('category', static function (Builder $query) use ($searchQuery) {
                $query->where('title', 'ILIKE', "%{$searchQuery}%");
            })
            ->orWhereHas('tags', static function (Builder $query) use ($searchQuery) {
                $query->where('title', 'ILIKE', "%{$searchQuery}%");
            })
            ->get();
        return view('list.material')->with(['materials' => $result]);
    }

    public function edit(Material $material, Type $type, Category $category, string $id): View
    {
        return view('edit.material')->with([
            'material' => $material->with($material->relations)->find($id),
            'types' => $type->all(),
            'categories' => $category->all(),
        ]);
    }

    public function show(Material $material, Tag $tag, string $id): View
    {
        return view('view.material')->with([
            'material' => $material->with($material->relations)->find($id),
            'tags' => $tag->all(),
        ]);
    }

    public function create(Type $type, Category $category): View
    {
        return view('create.material')->with([
            'types' => $type->all(),
            'categories' => $category->all(),
        ]);
    }

    public function store(Material $material, StoreMaterialRequest $request): View
    {
        $material->create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'author' => $request->get('author'),
            'type_id' => $request->get('typeId'),
            'category_id' => $request->get('categoryId'),
        ]);

        return view('list.material')->with(['materials' => $material->all()]);
    }

    public function update(Material $material, UpdateMaterialRequest $request, string $id): View
    {
        $material->where('id', $id)
            ->update([
                'title' => $request->get('title'),
                'description' => $request->get('description'),
                'author' => $request->get('author'),
                'type_id' => $request->get('typeId'),
                'category_id' => $request->get('categoryId'),
            ]);

        return view('list.material')->with(['materials' => $material->all()]);
    }

    public function remove(Material $material, string $id): RedirectResponse
    {
        $material->findOrFail($id)->delete();

        return redirect()->back();
    }
}

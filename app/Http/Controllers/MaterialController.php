<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;
use App\Models\Category;
use App\Models\Link;
use App\Models\Material;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index(Material $material, Request $request)
    {
        $searchQuery = $request->get('search-query');

        if(is_null($searchQuery)){
            return view('list.material')->with(['materials' => $material->all()]);
        }

        $result = $material->where('title', 'ILIKE', "%$searchQuery%")
                            ->orWhere('author', 'ILIKE', "%$searchQuery%")
                            ->orWhereHas('category', function($q) use ($searchQuery) {
                                $q->where('title', 'ILIKE', "%$searchQuery%");
                            })
                            ->orWhereHas('tags', function($q) use ($searchQuery) {
                                $q->where('title', 'ILIKE', "%$searchQuery%");
                            })
                            ->get();
        return view('list.material')->with(['materials' => $result]);
    }

    public function edit(Material $material, Type $type, Category $category, $id)
    {
        return view('edit.material')->with(['material' => $material->with($material->relations)->find($id),
                                                 'types' => $type->all(),
                                                 'categories' => $category->all()]);
    }

    public function show(Material $material, Tag $tag, $id)
    {
        return view('view.material')->with(['material' => $material->with($material->relations)->find($id),
                                                 'tags' => $tag->all()]);
    }

    public function create(Type $type, Category $category)
    {
        return view('create.material')->with(['types' => $type->all(),
                                                   'categories' => $category->all()]);
    }

    public function store(Material $material, StoreMaterialRequest $request)
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

    public function update(Material $material, UpdateMaterialRequest $request, $id)
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

    public function remove(Material $material, $id)
    {
        $material->find($id)->delete();

        return view('list.material')->with(['materials' => $material->all()]);
    }

}

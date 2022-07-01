<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Tag;

class MaterialController extends Controller
{
    public function show(Material $material, Tag $tag, $id = null)
    {
        if($id){
            return view('view.material')->with(['material' => $material->with($material->relations)->find($id),
                                                     'tags' => $tag->all()]);
        }
        return view('list.material')->with(['items' => $material->all()]);
    }

    public function edit(Material $material, $id = null)
    {
        if($id){
            return view('edit.material')->with(['item' => $material->with($material->relations)->find($id)]);
        }
        return view('edit.material');
    }
}

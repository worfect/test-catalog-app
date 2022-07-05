<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\BindTagRequest;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use \Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function index(Tag $tag): View
    {
        return view('list.tag')->with(['tags' => $tag->all()]);
    }

    public function edit(Tag $tag, string $id): View
    {
        return view('edit.tag')->with(['tag' => $tag->find($id)]);
    }

    public function create(): View
    {
        return view('create.tag');
    }

    public function store(Tag $tag, StoreTagRequest $request): RedirectResponse
    {
        $tag->create([
            'title' => $request->get('title'),
        ]);

        return redirect()->route('tag.index');
    }

    public function update(Tag $tag, UpdateTagRequest $request, string $id): RedirectResponse
    {
        $tag->where('id', $id)
            ->update(['title' => $request->get('title')]);

        return redirect()->route('tag.index');
    }

    public function bind(BindTagRequest $request): RedirectResponse
    {
        DB::table('material_tag')->insert([
            'material_id' => $request->get('materialId'),
            'tag_id' => $request->get('tagId')
        ]);

        return redirect()->route('material.show', $request->get('materialId'));
    }

    public function unbind(Request $request): RedirectResponse
    {
        DB::table('material_tag')->where([
            'material_id' => $request->get('materialId'),
            'tag_id' => $request->get('tagId')
        ])->delete();

        return redirect()->route('material.show', ['id' => $request->get('materialId')]);
    }

    public function remove(Tag $tag, string $id): RedirectResponse
    {
        $tag->findOrFail($id)->delete();

        return redirect()->back();
    }
}

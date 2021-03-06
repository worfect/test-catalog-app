<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\BindTagRequest;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

final class TagController extends Controller
{
    public function index(Tag $tag): View
    {
        return view('tag.list')->with(['tags' => $tag->all()]);
    }

    public function edit(Tag $tag): View
    {
        return view('tag.edit')->with(['tag' => $tag]);
    }

    public function create(): View
    {
        return view('tag.create');
    }

    public function store(Tag $tag, StoreTagRequest $request): RedirectResponse
    {
        $tag->create([
            'title' => $request->get('title'),
        ]);

        return redirect()->route('tag.index');
    }

    public function update(Tag $tag, UpdateTagRequest $request): RedirectResponse
    {
        $tag->update(['title' => $request->get('title')]);

        return redirect()->route('tag.index');
    }

    public function bind(BindTagRequest $request): RedirectResponse
    {
        DB::table('material_tag')->insert([
            'material_id' => $request->get('materialId'),
            'tag_id' => $request->get('tagId'),
        ]);

        return redirect()->route('material.show', $request->get('materialId'));
    }

    public function unbind(Request $request): RedirectResponse
    {
        DB::table('material_tag')->where([
            'material_id' => $request->get('materialId'),
            'tag_id' => $request->get('tagId'),
        ])->delete();

        return redirect()->route('material.show', ['id' => $request->get('materialId')]);
    }

    public function remove(Tag $tag): bool|null
    {
        return $tag->delete();
    }
}

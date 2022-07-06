<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;
use Illuminate\Http\RedirectResponse;

final class LinkController extends Controller
{
    public function store(Link $link, StoreLinkRequest $request): RedirectResponse
    {
        $link->create([
            'material_id' => $request->get('id'),
            'title' => $request->get('title'),
            'url' => $request->get('url'),
        ]);

        return redirect()->back();
    }

    public function update(Link $link, UpdateLinkRequest $request, string $id): RedirectResponse
    {
        $link->where('id', $id)
            ->update(['title' => $request->get('title'), 'url' => $request->get('url')]);

        return redirect()->back();
    }

    public function remove(Link $link, string $id): RedirectResponse
    {
        $link->findOrFail($id)->delete();

        return redirect()->back();
    }
}

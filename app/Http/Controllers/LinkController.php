<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;

final class LinkController extends Controller
{
    public function store(Link $link, StoreLinkRequest $request): bool
    {
        $link->create([
            'material_id' => $request->get('id'),
            'title' => $request->get('title'),
            'url' => $request->get('url'),
        ]);

        return true;
    }

    public function update(Link $link, UpdateLinkRequest $request): bool|int
    {
        return $link->update(['title' => $request->get('title'), 'url' => $request->get('url')]);
    }

    public function remove(Link $link): bool|null
    {
        return $link->delete();
    }
}

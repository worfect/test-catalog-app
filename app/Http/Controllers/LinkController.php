<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\linkRequest;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function create(Link $link, linkRequest $request)
    {
        $link->create([
            'material_id' => $request->get('id'),
            'title' => $request->get('title'),
            'url' => $request->get('url'),
        ]);

        return redirect()->back();
    }

    public function edit(Link $link, linkRequest $request)
    {
        $link->where('id', $request->get('id'))
                        ->update(['title' => $request->get('title'), 'url' => $request->get('url')]);

        return redirect()->back();
    }

    public function remove(Link $link, Request $request)
    {
        $link->find($request->get('linkId'))->delete();

        return redirect()->back();
    }
}

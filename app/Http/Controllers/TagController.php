<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class TagController extends Controller
{
    public function show(){
        return view('list.tag')->with(['name' => 'tag']);
    }
}

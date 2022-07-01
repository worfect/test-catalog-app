<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class MaterialController extends Controller
{
    public function show(){
        return view('list.material')->with(['name' => 'material']);
    }
}

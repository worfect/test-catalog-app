<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class CategoryController extends Controller
{
    public function show(){
        return view('list')->with(['name' => 'cat']);
    }
}

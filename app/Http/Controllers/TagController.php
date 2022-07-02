<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\BindTagRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function index(){
        return view('list.tag')->with(['name' => 'tag']);
    }

    public function bind(BindTagRequest $request){
        DB::table('material_tag')->insert([
            'material_id' => $request->get('materialId'),
            'tag_id' => $request->get('tagId')
        ]);

        return redirect()->route('material.show', $request->get('materialId'));
    }

    public function unbind(Request $request){
        DB::table('material_tag')->where([
            'material_id' => $request->get('materialId'),
            'tag_id' => $request->get('tagId')
        ])->delete();

        return redirect()->route('material.show', ['id' => $request->get('materialId')]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\EditorInit;
use App\Models\Document; 

class ConstructorController extends Controller
{ 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = 3; 
        $doc = Document::query()->find($id);
        return view('doc_configurator', ['doc' => $doc, 'id_parameter' => $id]);
    }
    // public function initConstructor()
    // {
    //     $post = EditorInit::find(1);
    //     echo $post->body;
    // }
}
<?php

namespace App\Http\Controllers;

use App\Models\EditorInit;
use App\Models\Document;
use AlAminFirdows\LaravelEditorJs\Facades\LaravelEditorJs;

class ConstructorController extends Controller
{ 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = 1;
        $editorInstance = EditorInit::find($id); 
        $doc = Document::query()->find($id);
        return view('doc_configurator', ['doc' => $doc, 'id_parameter' => $id]);
    }
    // public function initConstructor()
    // {
    //     $post = EditorInit::find(1);
    //     echo $post->body;
    // }
}
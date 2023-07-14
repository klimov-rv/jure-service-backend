<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DocumentResource;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Requests\DocumentRequest;
// use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

// use PhpOffice\PhpWord\PhpWord;

class DocumentController extends Controller
{
    public function index()
    {
        return DocumentResource::collection(Document::all());
    }
    public function store(DocumentRequest $request)
    {
        $data = $request->validated();
        $doc = Document::create($data);

        return DocumentResource::make($doc);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $doc
     * @return \Illuminate\Http\Response 
     */
    public function show(Document $doc)
    {
        return DocumentResource::make($doc);
    }

    public function update(DocumentRequest $request, $id)
    {
        $data = $request->validated();
        $doc = Document::query()->findOrFail($id);
        $doc->update($data);

        // $doc = $doc->fresh();

        return DocumentResource::make($doc);
    }
    public function destroy($id)
    {
        $model = Document::query()->findOrFail($id);
        $model->delete();

        return response(null, HttpResponse::HTTP_ACCEPTED);
    }

    public function demoshow($id)
    {
        $doc = Document::query()->find($id);
        return view('doc.show', ['doc' => $doc, 'id_parameter' => $id]);
    }

    public function getRTF(Request $request)
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $text = $section->addText($request->get('name'));
        $text = $section->addText($request->get('text'));
        $text = $section->addText($request->get('number'), array('name' => 'Arial', 'size' => 20, 'bold' => true));
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'RTF');
        $objWriter->save('getrtf.rtf');
        return response()->download(public_path('getrtf.rtf'));
    }

    public function weball()
    {
        $docs = Document::all();

        return view('doc_list', compact('docs'));
    }

    public function webconfig($id)
    {
        // $id = 3;
        $doc = Document::query()->find($id);
        return view('doc_configurator', ['doc' => $doc, 'id_parameter' => $id]);
    }
    
    public function webdemo($id)
    {
        // $id = 3;
        $doc = Document::query()->find($id);
        return view('doc_demo', ['doc' => $doc, 'id_parameter' => $id]);
    } 

    public function create(Request $request)
    {
        $validated = $request->validate([
            'text' => 'required',
        ]);
        $post = new Document;
        $post->text = json_encode($request->text);
        $post->save();

        $res = ['msg' => 'post saved'];

        return response()->json($res);
    }

    
    public function imageUpload(Request $request)
    {
        $file = $request->image;

        $fileNameWithExt = $file->getClientOriginalName();

        $file_name = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        $file_extension = $file->getClientOriginalExtension();

        $file_name_to_store = $file_name . '_' . time() . '.' . $file_extension;

        $file_store_path = $file->storeAs('upload/images/testfolder', $file_name_to_store);

        $file_preview_path = '/storage/app/upload/images/testfolder/' . $file_name_to_store;

        $resp = array(
            'success' => 1,
            'file' => (object) array(
                'url' => $file_preview_path,
                'stored_path' => $file_store_path,
                // any other image data - width, height, color, extension, etc
            )
        );

        return response()->json($resp);
    }

}
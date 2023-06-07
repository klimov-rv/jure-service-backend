<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DocumentResource;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
// use PhpOffice\PhpWord\PhpWord;

class DocumentController extends Controller
{
    /**
     * 
     * @OA\Get(
     *     path="/docs",
     *     operationId="documentsAll",
     *     tags={"Documents"},
     *     summary="Get all Documents",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Response(
     *         response="200",
     *         description="Everything is ok",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *              @OA\Schema(
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/Document"),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Docs not found",
     *     ),
     *     @OA\Tag(
     *         name="Documents",
     *     ),
     * )
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DocumentResource::collection(Document::all());
    }

    /**
     * @OA\Post(
     *     path="/docs",
     *     operationId="createDocument",
     *     tags={"Documents"},
     *     summary="Create Documents",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Response(
     *         response="201",
     *         description="Create Document",
     *     ), 
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *     ),
     * )
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TO DO переписать на ресурсы
        $model = new Document();
        $model->fill($request->all());
        $model->save();

        return response()->json($model);
    }


       /**
     * @OA\Get(
     *     path="/docs/{id}",
     *     operationId="getDocument",
     *     tags={"Documents"},
     *     summary="Get document by ID",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of document",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is ok",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="DocTemplate not found"
     *     ),
     * )
     * 
     * 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doc = Document::query()->find($id);
 
        return view('doc.show', ['doc' => $doc, 'id_parameter' => $id]); 
        // return new DocumentResource(Document::findOrFail($id));
    }

    /**
     * @OA\Put(
     *     path="/docs/{id}",
     *     operationId="updateDocument",
     *     tags={"Documents"},
     *     summary="Update Document by ID",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of document",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is ok",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="DocTemplate not found"
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Validation exception"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *     ),
     * )
     *
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $params = $request->all();
        $model  = Document::query()->findOrFail($id);
        $model->fill($params);
        $model->save();

        return response()->json($model);
    }
 /**
     * @OA\Delete(
     *     path="/docs/{id}",
     *     operationId="deleteDocument",
     *     tags={"Documents"},
     *     summary="Delete document by ID",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of document",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *         response="202",
     *         description="Deleted",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Doc not found",
     *     ),
     * )
     *
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Document::query()->findOrFail($id);
        $model->delete();

        return response(null, HttpResponse::HTTP_ACCEPTED);
    }

    public function getRTF(Request $request)
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $text = $section->addText($request->get('name'));
        $text = $section->addText($request->get('text'));
        $text = $section->addText($request->get('number'),array('name'=>'Arial','size' => 20,'bold' => true)); 
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'RTF');
        $objWriter->save('getrtf.rtf');
        return response()->download(public_path('getrtf.rtf'));
    }

}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocField\StoreRequest;
use App\Http\Requests\DocField\UpdateRequest;
use App\Http\Resources\DocField\DocFieldResource;
use App\Models\DocField;
use Illuminate\Http\Request;

    /**
     * @OA\Post(
     *      path="/doc_fields",
     *      summary="Create",
     *     security={
     *       {"api_key": {}},
     *     },
     *      tags={"DocField"},
     * 
     *      @OA\RequestBody(
     *         @OA\JsonContent(
     * 			    allOf={
     *                  @OA\Schema(
     * 				        type="object",
     * 				        @OA\Property(property="doc_field_name", type="string", example="Some field name"),
     * 				        @OA\Property(property="doc_field_id", type="integer", example=33),
     *                  )
     *              }
     * 	       )
     *     ),
     * 
     *     @OA\Response(
     *         response="200",
     *         description="Everything is ok",
     *          @OA\JsonContent(
     * 				        type="object",
     * 				        @OA\Property(property="id", type="integer", example=4),
     * 				        @OA\Property(property="doc_field_name", type="string", example="Some field name"),
     * 				        @OA\Property(property="doc_field_id", type="integer", example=33),
     *          )
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Invalid ID supplier",
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="DocTemplate not found",
     *     ),
     * ),
     * * @OA\Get(
     *      path="/doc_fields",
     *      summary="Read", 
     *      tags={"DocField"}, 
     *     @OA\Response(
     *         response="200",
     *         description="successful operation",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="DocField not found",
     *     ),
     * ) 
     * * @OA\Put(
     *     path="/doc_fields/{id}",
     *     operationId="updateDocField",
     *     tags={"DocField"},
     *     summary="Update",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of DocField to update",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Invalid ID supplied"
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="DocField not found"
     *     ),
     *     @OA\Response(
     *         response="405",
     *         description="Validation exception"
     *     ),
     * )
     * @OA\Delete(
     *     path="/doc_fields/{id}",
     *     operationId="deleteDocField",
     *     tags={"DocField"},
     *     summary="Delete",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="DocField ID to delete",
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
     *         response="400",
     *         description="Invalid ID supplied",
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="DocField not found",
     *     ),
     * )
    */
class DocFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doc_fields = DocField::all();
        return DocFieldResource::collection($doc_fields);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @param  \App\Models\DocField  $docField
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        return DocFieldResource::make(DocField::create($data))->resolve();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocField  $docField
     * @return \Illuminate\Http\Response
     */
    public function show(DocField $docField)
    {
        return DocFieldResource::make($docField);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocField  $docField
     * @return \Illuminate\Http\Response
     */
    public function edit(DocField $docField)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\DocField  $docField
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, DocField $docField)
    {
        $data = $request->validated();
        $docField->update($data);

        // $docField = $docField->fresh();

        return DocFieldResource::make($docField);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocField  $docField
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocField $docField)
    {
        $docField->delete();
        return response()->json([
            'message' => 'done'
        ]);
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DocTemplateResource;
use App\Models\DocTemplate;
use Illuminate\Http\Request;

class DocTemplateController extends Controller
{
    
    /**
     * 
     * @OA\Get(
     *     path="/doc_templates",
     *     tags={"DocTemplates"},
     *     operationId="getDocTemplates",
     *     summary="Get all DocTemplates",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Response(
     *         response="200",
     *         description="successful operation",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *              @OA\Schema(
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/DocTemplate"),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="DocTemplate not found",
     *     ),
     * ) 
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return DocTemplate::all();
    }


    /**
     * @OA\Post(
     * 
     *     path="/doc_templates",
     *     tags={"DocTemplates"},
     *     summary="Get all DocTemplates",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Response(
     *         response="200",
     *         description="successful operation",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *              @OA\Schema(
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/DocTemplate"),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="DocTemplate not found",
     *     ),
     * ) 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @OA\Get(
     *     path="/doc_templates/{id}",
     *     operationId="getDocTemplateById",
     *     tags={"DocTemplates"},
     *     summary="Get DocTemplate by ID",
     *     description="Returns a single DocTemplate",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of DocTemplate",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="DocTemplate not found"
     *     ),
     * )
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new DocTemplateResource(DocTemplate::with('docs')->findOrFail($id)); 
    }

    
    /**
     * @OA\Put(
     *     path="/doc_templates/{id}",
     *     operationId="updateDocTemplate",
     *     tags={"DocTemplates"},
     *     summary="Update an existing DocTemplate by ID",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of DocTemplate to update",
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
     *         description="DocTemplate not found"
     *     ),
     *     @OA\Response(
     *         response="405",
     *         description="Validation exception"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     },
     * )
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    
    /**
     * @OA\Delete(
     *     path="/doc_templates/{id}",
     *     operationId="deleteDocTemplate",
     *     tags={"DocTemplates"},
     *     summary="Deletes a DocTemplate",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="DocTemplate ID to delete",
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
     *         description="DocTemplate not found",
     *     ),
     * )
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

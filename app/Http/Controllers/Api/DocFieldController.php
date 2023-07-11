<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocField\StoreRequest;
use App\Http\Requests\DocField\UpdateRequest;
use App\Http\Resources\DocField\DocFieldResource;
use App\Models\DocField;
use Illuminate\Http\Request;

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

        return DocFieldResource::make(DocField::create($data));
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

<?php

namespace App\Http\Resources\DocField;

use Illuminate\Http\Resources\Json\JsonResource;

class DocFieldResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'doc_field_name' => $this->doc_field_name, 
            'doc_field_id' => $this->doc_field_id,
        ];
    }
}

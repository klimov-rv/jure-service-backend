<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    { 
            $rules = [
                'name' => 'required|string|unique:id',
                'text' => '',
            ];
      
            switch ($this->getMethod())
            {
              case 'POST':
                return $rules;
              case 'PUT':
                return [
                  'id' => 'required|integer|exists:id',
                  'name' => [
                    'required',
                  ]
                ] + $rules; 
              // case 'PATCH':
              case 'DELETE':
                return [
                    'id' => 'required|integer|exists:id'
                ];
            } 
    };
}

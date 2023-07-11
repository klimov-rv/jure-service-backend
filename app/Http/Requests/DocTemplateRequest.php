<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocTemplateRequest extends FormRequest
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
    //   POST ожидаем:
    //   { 
    //     "id": 1,
    //     "title": "test111",              // обязательное
    //   }
    //   PUT / PATCH ожидаем:
    //   { 
    //     "id": 1,                         // обязательное из
    //     "title": "test111 edited",       // обязательное 
    //   }
    $rules = [
      'title' => 'required|string|unique:doc_templates,name',
    ];

    switch ($this->getMethod()) {
      case 'POST':
        return $rules;
      case 'PUT':
        return [
          'id' => 'required|integer|exists:doc_templates,id',
          'title' => [
            'required',
          ]
        ] + $rules;
      case 'PATCH':
        return [
          'id' => 'required|integer|exists:doc_templates,id',
          'title' => [
            'required',
          ]
        ] + $rules;
      case 'DELETE':
        return [
          'id' => 'required|integer|exists:doc_templates,id'
        ];
    }
  }
}
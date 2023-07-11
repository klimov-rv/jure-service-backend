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
    //   POST ожидаем:
    //   { 
    //     "id": 1,
    //     "name": "test111",             // обязательное
    //     "text": "text55555555",
    //     "doc_template_id": 1
    //   }
    //   PUT / PATCH ожидаем:
    //   { 
    //     "id": 1,                       // обязательное из адреса запроса
    //     "name": "test111 edited",      // обязательное
    //     "text": "text55555555 edited", 
    //   }
    $rules = [
      'name' => 'required|string|unique:documents,name',
      'text' => '',
    ];

    switch ($this->getMethod()) {
      case 'POST':
        return $rules;
      case 'PUT':
        return [
          'id' => 'required|integer|exists:documents,id',
          'name' => [
            'required',
          ]
        ] + $rules;
      case 'PATCH':
        return [
          'id' => 'required|integer|exists:documents,id',
          'name' => [
            'required',
          ]
        ] + $rules;
      case 'DELETE':
        return [
          'id' => 'required|integer|exists:documents,id'
        ];
    }
  }
}
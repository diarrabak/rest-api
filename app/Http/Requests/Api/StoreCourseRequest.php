<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule ;

class StoreCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code' => ['required', 'string'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'semester' => ['required', Rule::in(['S1','S2','S3','S4'])],// Semester can have only one of these 4 values
            'specializationId' => ['required', 'integer'],
            'departmentId' => ['required', 'integer'],
        ];
    }

    protected function prepareForValidation() //For saving in the database
    {
        $this->merge([
            'specialization_id' => $this->spacializationId,
            'department_id' => $this->departmentId,
        ]);
    }
}

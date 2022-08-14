<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInformationRequest extends FormRequest
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
        $method = $this->method();
        if ($method) {
            return [
                'title' => ['required', 'string'],
                'description' => ['required', 'string'],
                'document' => ['required', 'string'],
                'semester' => ['required', 'string'],
                'departmentId' => ['required', 'integer'],
            ];
        } else {
            return [
                'title' => ['sometimes', 'required', 'string'],
                'description' => ['sometimes', 'required', 'string'],
                'document' => ['sometimes', 'required', 'string'],
                'semester' => ['sometimes', 'required', 'string'],
                'departmentId' => ['sometimes', 'required', 'integer'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'department_id' => $this->departmentId,
        ]);
    }
}

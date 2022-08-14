<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobopeningRequest extends FormRequest
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
        if ($method == "PUT") {
            return [
                'name' => ['required', 'string'],
                'description' => ['required', 'string'],
                'departmentId' => ['required', 'integer'],
            ];
        } else {
            return [
                'name' => ['sometimes', 'required', 'string'],
                'description' => ['sometimes', 'required', 'string'],
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

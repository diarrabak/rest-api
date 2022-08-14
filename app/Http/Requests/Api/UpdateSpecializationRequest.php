<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSpecializationRequest extends FormRequest
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
                'picture' => ['required', 'image'],
                'userId' => ['required', 'integer'],
                'departmentId' => ['required', 'integer'],
            ];
        } else {
            return [
                'name' => ['sometimes',  'string'],
                'description' => ['sometimes',  'string'],
                'picture' => ['sometimes',  'image'],
                'userId' => ['sometimes', 'required', 'integer'],
                'departmentId' => ['sometimes', 'required', 'integer'],
            ];
        }
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->userId,
            'department_id' => $this->departmentId,
        ]);
    }
}

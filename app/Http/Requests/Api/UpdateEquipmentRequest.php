<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEquipmentRequest extends FormRequest
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
                'picture' => ['required', 'string'],
                'laboratoryId' => ['required', 'integer'],
            ];
        } else {
            return [
                'name' => ['sometimes', 'required', 'string'],
                'description' => ['sometimes', 'required', 'string'],
                'picture' => ['sometimes', 'required', 'string'],
                'laboratoryId' => ['sometimes', 'required', 'integer'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'laboratory_id' => $this->laboratoryId,
        ]);
    }
}

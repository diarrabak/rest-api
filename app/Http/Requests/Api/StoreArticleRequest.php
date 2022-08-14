<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();  //Current user
        return $user != null && $user->tokenCan('*');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'link' => ['required', 'string'],
            'authors' => ['required', 'string'], //we can add min:3 or max:54
            // 'authors.*' => ['required', 'string'], //Individual element in the array, we can add distinct, min ....
            'publication' => ['required', 'string'],
            'year' => ['required', 'date'],
            'userId' => ['required', 'integer'], //use the camelCase as convention in Json
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->userId, //Required to save data to the database
        ]);
    }
}

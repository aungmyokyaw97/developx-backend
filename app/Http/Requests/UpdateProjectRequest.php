<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {

        return [
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
            'thumbnail' => 'required|mimes:jpeg,png,jpg|max:40000',
            'app_image.*' => 'nullable|image|max:40000',
            'web_image.*' => 'nullable|image|max:40000',
        ];
    }
}

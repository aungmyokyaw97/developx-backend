<?php

namespace App\Http\Requests;

use App\Models\Job;
use Illuminate\Foundation\Http\FormRequest;

class CreateJobRequest extends FormRequest
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
            'job_type' => 'required',
            'salary' => 'required',
            'description' => 'required',
            'requirements' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'active' => 'required|boolean'
        ];
    }
}

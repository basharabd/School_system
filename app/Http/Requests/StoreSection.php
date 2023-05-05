<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSection extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            
            'section_name' => 'required',
            'section_name_en' => 'required',
            'grade_id' => 'required',
            'class_id' => 'required',
           
        ];
    }

    public function messages()
    {
        return [
            'section_name.required' => trans('Sections_trans.required_ar'),
            'section_name_en.required' => trans('Sections_trans.required_en'),
            'grade_id.required' => trans('Sections_trans.Grade_id_required'),
            'class_id.required' => trans('Sections_trans.Class_id_required'),
        ];
    }
}
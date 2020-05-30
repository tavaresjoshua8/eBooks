<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
            'name'          => 'required|max:128',
            'slug'          => 'required|max:128|unique:books,slug',
            'folio'         => 'required|numeric|unique:books,folio',
            'author'        => 'required|max:128',
            'translation'   => 'required|max:128',
            'editorial'     => 'required|max:128',
            'issue'         => 'required|max:20',
            'country'       => 'required|max:128',
            'year'          => 'nullable|digits:4|integer|min:1800|max:'.date('Y'),
            'pages'         => 'required|max:128',
            'review'        => 'required',
            'pdf'           => 'required|max:300',
            'image'         => 'required|max:2048',
        ];
    }
}

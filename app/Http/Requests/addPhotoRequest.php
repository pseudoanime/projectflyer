<?php

namespace App\Http\Requests;

use App\Flyer;
use App\Http\Requests\Request;

class addPhotoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $flyer = Flyer::where('postcode', $this->segment(1))
                        ->where('street', $this->segment(2))
                        ->first();

        return $flyer->user_id == auth()->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'photo' =>  'required|mimes:jpg,png,bmp,jpeg'
        ];
    }
}

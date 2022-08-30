<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class FormArticleRequest extends FormRequest
{
    public static function validation($code = '')
    {
        $validateUnique = '';
        if ($code !== request()->get('character_code')) {
            $validateUnique = '|unique:articles';
        }

//        if(request()->get('published') == null){
//            $published = 0;
//        }


        $attributes = request()->validate([
            'name' => 'required|min:5|max:255',
            'body' => 'required|max:255',
            'published' => 'nullable',
            'detailed_description' => 'required',
            'character_code' => 'required|regex:/^[0-9a-zA-Z\-\_]+$/' . $validateUnique,
        ]);

        $attributes['owner_id'] = auth()->id();

        return $attributes;
    }
}

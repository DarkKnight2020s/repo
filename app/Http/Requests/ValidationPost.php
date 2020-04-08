<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ValidationPost extends FormRequest
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
        // return [

        //     'name' => 'bail|required|alpha_num|min:5|max:10|unique:tasks',
            
        // ];
    

        $rules = [];

        switch($this->method())
        {
            // case 'GET':

            case 'POST':
            {
                $rules = [                                                              
                    'name' => 'bail|required|alpha_num|min:5|max:10|unique:tasks',
                ];
            }
            
            case 'PATCH':{

                $rules = [
                    'name' => 'bail|required|alpha_num|min:5|max:10|unique:tasks',
                ];
            }
            case 'PUT':
             {
                $rules = [
                    'name' => 'bail|required|alpha_num|min:5|max:10|unique:tasks',
                ];
             }

            default:break;
        }
    
        return $rules;

    }


}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Services\CheckControlNumberService;

class CompanyStoreRequest extends FormRequest
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
        $web_symbols = 'regex:/^[a-z0-9]*.edu.kz/i'; // желаемое название субдомена edu.kz, например: school18.edu.kz
        $digitals = 'regex:/^\d+$/';                 // значение должно быть числом
        $kazah_symbols_digits = 'regex:/^[a-яА-Яa-zA-Z0-9ҚқӘәҺһІіҢңҒғҰұӨө\s«»,.#\\\№@&()\-]*$/'; // Символы кирилицы, латиницы + казахские символы(кирил)
        $kazah_symbols = 'regex:/^[a-яА-Яa-zA-ZҚқӘәҺһІіҢңҒғҰұӨө\s]*$/'; // Символы кирилицы, латиницы + казахские символы(кирил)
        $lat_symbols_digits = 'regex:/^[a-zA-Z0-9]*$/';                 // для БИК, только цифры + латинские символы

        return [
            'company_name' => ['required', 'max:255', $kazah_symbols_digits], 
            'company_address' => ['required', 'max:255', $kazah_symbols_digits],
            'post_index' => ['required', $digitals],
            'company_phone' => ['required', $digitals],
            'company_email' => ['required', 'email'],
            'company_bin' => ['required', 'min:12', $digitals],
            'company_iik' => ['required', 'min:20', $digitals],
            'bank_name' => ['required', $kazah_symbols],
            'bank_bik' => ['required', 'min:8', $lat_symbols_digits],
            'company_ceo_fio' => ['required', 'max:255', $kazah_symbols],
            'responsible_person' => ['required', 'max:255', $kazah_symbols],
            'responsible_person_phone' => ['required', $digitals],
            'responsible_person_email' => ['required', 'email'],  
            'desired_domen_name' => ['required', 'min:8', $web_symbols],
            'file' =>['required', 'max:2048', 'mimes:pdf'],   
        ];
    }
}

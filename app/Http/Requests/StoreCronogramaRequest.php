<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCronogramaRequest extends FormRequest
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

    public function prepareForValidation()
    {
        $data['user_id'] = auth()->user()->id;
        $data['hora'] = $this->hora;

        $this->request->add($data);
    }

    /**
     * Get the validation rules that apply to the request.  
     *
     * @return array
     */
    public function rules()
    {
        return [
            'atividade' => ['max:300', 'required'],
            'dia_semana' => ['required', 'integer', 'max:7'],
            'hora' => ['max:300', 'max:10', 'date_format:H:i'],
            'user_id' => ['required', 'integer', 'exists:App\Models\User,id']
        ];
    }
}

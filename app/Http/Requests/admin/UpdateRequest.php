<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       return Gate::allows('update.product');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'Prece_nosaukums' => 'nullable|string',
            'Vienību_skaits' => 'nullable|numeric',
            'Cena_par_vienu_vienību' => 'nullable|numeric|between:0,99999999.99'
        ];
    }
    
    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        $sanitized['Prece nosaukums'] = $this->request->get('Prece_nosaukums') ? $this->request->get('Prece_nosaukums') : null;
        $sanitized['Vienību skaits'] = $this->request->get('Vienību_skaits') ? $this->request->get('Vienību_skaits'): null;
        $sanitized['Cena par vienu vienību'] = $this->request->get('Cena_par_vienu_vienību') ? $this->request->get('Cena_par_vienu_vienību') : null;

        return $sanitized;
    }
}

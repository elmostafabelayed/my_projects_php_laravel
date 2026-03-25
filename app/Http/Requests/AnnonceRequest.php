<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AnnonceRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           "titre"=>["required", Rule::unique("annonces", "titre")->ignore($this->annonce)],
            "description"=>"required|max:100",
            "type"=>"required|in:Appartement,Maison,Villa,Magasin,Terrain",
            "superficie"=>"required|integer|min:20",
            "ville"=>"required|alpha",
            "prix"=>"required|numeric|gt:0",
       
        ];
    }
    public function messages()
    {
        return [
            "titre.unique"=>"Veuillez choisir un autre titre",
            "description.required"=>"Vous devez fournir une description",
            "type.in"=>"Vous devez choisir une des valeurs: Appartement,Maison,Villa,Magasin,Terrain",
            "prix.gt"=>"Entrez un prix valide"
        ];
    }
}

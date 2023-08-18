<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Annotations as OA;


/**
 * @OA\Schema(
 *     title="RegistroRequest",
 *     description="Dados necessários para criar um registro",
 *     @OA\Property(
 *         property="servico",
 *         type="string",
 *         example="Serviço de exemplo",
 *     ),
 *     @OA\Property(
 *         property="mensagem",
 *         type="string",
 *         example="Mensagem de exemplo",
 *     ),
 * )
 */
class RegistroRequest extends FormRequest
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
    public function rules()
    {
        return [
            'servico' => 'required|string',
            'mensagem' => 'required|string',
        ];
    }

}

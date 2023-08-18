<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RegistroService;
use App\Http\Requests\RegistroRequest;
use OpenApi\Annotations as OA;

class RegistroController extends Controller
{
    protected $registroService;

    public function __construct(RegistroService $registroService)
    {
        $this->registroService = $registroService;
    }

    /**
     * @OA\Post(
     *     tags={"Registros"},
     *     path="/api/registros",
     *     summary="Cria um novo registro",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/RegistroRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Registro criado com sucesso",
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Erro de validação",
     *     ),
     * )
     */
    public function store(RegistroRequest $request)
    {
        $data = $request->validated();
        $this->registroService->createRegistro($data);

        return response()->json(['message' => 'Registro criado com sucesso']);
    }

    /**
        * @OA\Get(
        *     tags={"Registros"},
        *     path="/api/registros",
        *     summary="Lista todos os registros",
        *     @OA\Response(
        *         response=200,
        *         description="Lista de registros",
        *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/RegistroRequest"))
        *     ),
        * )
    */
    public function index()
    {
        $registros = $this->registroService->getAllRegistros();
        return response()->json($registros);
    }
}

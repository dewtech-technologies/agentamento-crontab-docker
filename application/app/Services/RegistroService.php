<?php

namespace App\Services;

use App\Repositories\RegistroRepository;

class RegistroService
{
    protected $registroRepository;

    public function __construct(RegistroRepository $registroRepository)
    {
        $this->registroRepository = $registroRepository;
    }

    public function createRegistro(array $data)
    {
        return $this->registroRepository->create($data);
    }

    public function getAllRegistros()
    {
        return $this->registroRepository->all();
    }
}

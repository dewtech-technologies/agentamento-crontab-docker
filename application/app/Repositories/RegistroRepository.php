<?php

namespace App\Repositories;

use App\Models\Registro;

class RegistroRepository
{
    public function create(array $data)
    {
        return Registro::create($data);
    }

    public function all()
    {
        return Registro::all();
    }
}

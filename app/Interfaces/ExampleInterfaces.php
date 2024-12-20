<?php

namespace App\Interfaces;

use App\Http\Requests\ExampleRequest;

interface ExampleInterfaces
{
    public function getAll();
    public function createData(ExampleRequest $request);
}

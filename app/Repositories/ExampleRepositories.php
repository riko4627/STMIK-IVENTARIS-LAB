<?php

namespace App\Repositories;

use App\Http\Requests\ExampleRequest;
use App\Interfaces\ExampleInterfaces;

class ExampleRepositories implements ExampleInterfaces
{
    public function getAll() {}
    public function createData(ExampleRequest $request) {}
}

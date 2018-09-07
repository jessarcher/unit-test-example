<?php

namespace App\Controllers;

use App\Services\ServiceInterface;

class GreatController
{
    protected $service;

    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    public function create($request)
    {
        if ($request['foo'] === 'scenario1') {
            return $this->service->create([
                'foo' => 'bar',
            ]);
        } elseif ($request['foo'] === 'scenario2') {
            return $this->service->create([
                'foo' => 'baz',
            ]);
        }
    }
}

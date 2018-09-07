<?php

namespace App\Controllers;

use App\Services\ServiceA;

class GoodController
{
    protected $service;

    public function __construct(ServiceA $service)
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

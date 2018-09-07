<?php

namespace App\Controllers;

use App\Services\ServiceA;

class BadController
{
    public function create($request)
    {
        $service = new ServiceA;

        if ($request['foo'] === 'scenario1') {
            return $service->create([
                'foo' => 'bar',
            ]);
        } elseif ($request['foo'] === 'scenario2') {
            return $service->create([
                'foo' => 'baz',
            ]);
        }
    }
}

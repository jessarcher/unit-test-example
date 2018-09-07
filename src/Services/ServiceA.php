<?php

namespace App\Services;

class ServiceA implements ServiceInterface
{
    public function create(array $attributes) : string
    {
        echo "I'm doing something intensive here, maybe even hitting the database or a web service\n";

        sleep(3);

        return 'success';
    }
}

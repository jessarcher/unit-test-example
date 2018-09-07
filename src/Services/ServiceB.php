<?php

namespace App\Services;

class ServiceB implements ServiceInterface
{
    public function create(array $attributes) : string
    {
        echo "I'm doing something different here, but also intensive\n";

        sleep(3);

        return 'success';
    }
}

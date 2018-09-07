<?php

namespace App\Services;

interface ServiceInterface
{
    public function create(array $attributes) : string;
}

<?php

use App\Controllers\GreatController;
use App\Services\ServiceInterface;
use PHPUnit\Framework\TestCase;

class GreatControllerTest extends TestCase
{
    public function setUp()
    {
        // This is even better because now the Controller class only depends on
        // an abstraction, rather than a concrete class. We can inject any
        // service that adheres to the correct contract (Open/Closed principle)
        $this->mockService = Mockery::mock(ServiceInterface::class);
        $this->greatController = new GreatController($this->mockService);

        parent::setUp();
    }

    public function test_it_creates_scenario1()
    {
        $this->mockService->shouldReceive('create')->with(['foo' => 'bar'])->andReturn('success');

        $response = $this->greatController->create(['foo' => 'scenario1']);

        $this->assertContains('success', $response);
    }

    public function test_it_creates_scenario2()
    {
        $this->mockService->shouldReceive('create')->with(['foo' => 'baz'])->andReturn('success');

        $response = $this->greatController->create(['foo' => 'scenario2']);

        $this->assertContains('success', $response);
    }
}

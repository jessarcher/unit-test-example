<?php

use App\Controllers\GoodController;
use App\Services\ServiceA;
use PHPUnit\Framework\TestCase;

class GoodControllerTest extends TestCase
{
    public function setUp()
    {
        $this->mockService = Mockery::mock(ServiceA::class);
        $this->goodController = new GoodController($this->mockService);

        parent::setUp();
    }

    public function test_it_creates_scenario1()
    {
        // We can make assertions about how the logic inside the controller
        // interacts with other modules without needing to test those modules.
        $this->mockService->shouldReceive('create')->with(['foo' => 'bar'])->andReturn('success');

        $response = $this->goodController->create(['foo' => 'scenario1']);

        $this->assertContains('success', $response);
    }

    public function test_it_creates_scenario2()
    {
        // Testing alternative logic scenarios inside the controller is quick
        // because we're not including another module whose logic isn't impacted
        // by the alternative scenario here.
        $this->mockService->shouldReceive('create')->with(['foo' => 'baz'])->andReturn('success');

        $response = $this->goodController->create(['foo' => 'scenario2']);

        $this->assertContains('success', $response);
    }
}

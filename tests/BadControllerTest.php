<?php

use App\Controllers\BadController;
use PHPUnit\Framework\TestCase;

class BadControllerTest extends TestCase
{
    public function setUp()
    {
        $this->badController = new BadController();

        parent::setUp();
    }

    public function test_it_creates_scenario_1()
    {
        // This will also be testing the behaviour of the Service class and any
        // errors that occur will be harder to track down because there are more
        // places they could occur
        //
        // We also can't test what the Service class received, only what it
        // returned, which might not tell us enough.
        $response = $this->badController->create(['foo' => 'scenario1']);

        $this->assertEquals('success', $response);
    }

    public function test_it_creates_scenario_2()
    {
        // Testing alternative scenarios within the Controller logic are slower
        // because they still call the service which does not need to be tested
        // again for this scenario.
        //
        // We also have no way of knowing whether the alternative scenario logic
        // actually fired. All we know is the Service was called and that it
        // returned a response.
        $response = $this->badController->create(['foo' => 'scenario2']);

        $this->assertEquals('success', $response);
    }
}

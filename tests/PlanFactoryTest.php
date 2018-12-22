<?php

use LineAtCost\PlanFactory;

/**
 * PlanFactory test case.
 */
class PlanFactoryTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     * @var PlanFactory
     */
    private $planFactory;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->planFactory = new PlanFactory();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->planFactory = null;

        parent::tearDown();
    }

    /**
     * Constructs the test case.
     */
    public function __construct()
    {
    }

    /**
     * Tests PlanFactory->__construct()
     */
    public function test__construct()
    {
        $this->assertEquals(PlanFactory::TARGET_2016, $this->planFactory->getTargetBase());
    }

    public function test__construct_param()
    {
        $planFactory = new PlanFactory(PlanFactory::PLAN2016BASIC_ID);
        $this->assertEquals(PlanFactory::PLAN2016BASIC_ID, $planFactory->getTargetBase());
    }

    /**
     * Tests PlanFactory->getInstance()
     */
    public function testGetInstance_invalid()
    {
        $instance = $this->planFactory->getInstance(99);
        $this->assertNull($instance);
    }

    public function testGetInstance_2016Free_const()
    {
        $instance = $this->planFactory->getInstance(PlanFactory::PLAN2016FREE_ID);
        $this->assertEquals('LineAtCost\Plan\Plan2016Free', get_class($instance));
    }

    public function testGetInstance_2016Basic_value()
    {
        $instance = $this->planFactory->getInstance(2);
        $this->assertEquals('LineAtCost\Plan\Plan2016Basic', get_class($instance));
    }

    public function testGetInstance_2016Pro_value2()
    {
        $instance = $this->planFactory->getInstance(13);
        $this->assertEquals('LineAtCost\Plan\Plan2016Pro', get_class($instance));
    }

    public function testGetInstance_2016Pro2_all()
    {
        $planFactory = new PlanFactory(PlanFactory::TARGET_ALL);
        $instance = $planFactory->getInstance(PlanFactory::PLAN2016PRO2_ID);
        $this->assertEquals('LineAtCost\Plan\Plan2016Pro2', get_class($instance));
    }

    public function testGetInstance_2016Developer()
    {
        $instance = $this->planFactory->getInstance(9);
        $this->assertEquals('LineAtCost\Plan\Plan2016Developer', get_class($instance));
    }

    public function testGetInstance_2019Free()
    {
        $instance = $this->planFactory->getInstance(21);
        $this->assertEquals('LineAtCost\Plan\Plan2019Free', get_class($instance));
    }

    public function testGetInstance_2019Light_target()
    {
        $planFactory = new PlanFactory(PlanFactory::TARGET_2019);
        $instance = $planFactory->getInstance(PlanFactory::PLAN2019LIGHT_ID);
        $this->assertEquals('LineAtCost\Plan\Plan2019Light', get_class($instance));
    }

    public function testGetInstance_2019Standard_target()
    {
        $planFactory = new PlanFactory(PlanFactory::TARGET_2019);
        $instance = $planFactory->getInstance(3);
        $this->assertEquals('LineAtCost\Plan\Plan2019Standard', get_class($instance));
    }
}


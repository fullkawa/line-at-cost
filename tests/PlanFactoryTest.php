<?php

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

        // TODO Auto-generated PlanFactoryTest::setUp()

        $this->planFactory = new LineAtCost\PlanFactory(/* parameters */);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        // TODO Auto-generated PlanFactoryTest::tearDown()
        $this->planFactory = null;

        parent::tearDown();
    }

    /**
     * Constructs the test case.
     */
    public function __construct()
    {
        // TODO Auto-generated constructor
    }

    /**
     * Tests PlanFactory->__construct()
     */
    public function test__construct()
    {
        // TODO Auto-generated PlanFactoryTest->test__construct()
        $this->markTestIncomplete("__construct test not implemented");

        $this->planFactory->__construct(/* parameters */);
    }

    /**
     * Tests PlanFactory->getInstance()
     */
    public function testGetInstance()
    {
        // TODO Auto-generated PlanFactoryTest->testGetInstance()
        $this->markTestIncomplete("getInstance test not implemented");

        $this->planFactory->getInstance(/* parameters */);
    }
}


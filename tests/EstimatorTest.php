<?php

use LineAtCost\Estimator;
use LineAtCost\PlanFactory;
use LineAtCost\Exception\InvalidUsageException;

/**
 * Estimator test case.
 */
class EstimatorTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     * @var Estimator
     */
    private $estimator;

    private $factory;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->factory = new PlanFactory(PlanFactory::TARGET_ALL);

    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->factory = null;

        parent::tearDown();
    }

    /**
     * Constructs the test case.
     */
    public function __construct()
    {
    }

    /**
     * Tests Estimator::estimate()
     */
    public function testEstimate_2016Free()
    {
        $plan = $this->factory->getInstance(PlanFactory::PLAN2016FREE_ID);
        $cost = Estimator::estimate($plan);
        $this->assertEquals(0, $cost);
    }

    public function testEstimate_2016Basic()
    {
        $plan = $this->factory->getInstance(PlanFactory::PLAN2016BASIC_ID);
        $cost = Estimator::estimate($plan);
        $this->assertEquals(5400, $cost);
    }

    public function testEstimate_2016Pro()
    {
        $plan = $this->factory->getInstance(PlanFactory::PLAN2016PRO_ID);
        $cost = Estimator::estimate($plan);
        $this->assertEquals(21600, $cost);
    }

    public function testEstimate_2016Pro2()
    {
        $plan = $this->factory->getInstance(PlanFactory::PLAN2016PRO2_ID);
        $cost = Estimator::estimate($plan);
        $this->assertEquals(32400, $cost);
    }

    public function testEstimate_2016Developer()
    {
        $plan = $this->factory->getInstance(PlanFactory::PLAN2016DEVELOPER_ID);
        $cost = Estimator::estimate($plan);
        $this->assertEquals(0, $cost);
    }

    /**
     * @expectedException InvalidUsageException
     */
    public function testEstimate_2019Free_no_usages()
    {
        $plan = $this->factory->getInstance(PlanFactory::PLAN2019FREE_ID);
        $cost = Estimator::estimate($plan);
    }

    /**
     * @expectedException InvalidUsageException
     */
    public function testEstimate_2019Light_no_message_count()
    {
        $plan = $this->factory->getInstance(PlanFactory::PLAN2019LIGHT_ID);
        $usages = [];
        $cost = Estimator::estimate($plan, $usages);
    }

    /**
     * @expectedException InvalidUsageException
     */
    public function testEstimate_2019Free_over_limit()
    {
        $plan = $this->factory->getInstance(PlanFactory::PLAN2019FREE_ID);
        $usages = [
            'message_count' => 1001
        ];
        $cost = Estimator::estimate($plan, $usages);
    }

    public function testEstimate_2019Free_under_limit()
    {
        $plan = $this->factory->getInstance(PlanFactory::PLAN2019FREE_ID);
        $usages = [
            'message_count' => 1000
        ];
        $cost = Estimator::estimate($plan, $usages);
        $this->assertEquals(0, $cost);
    }

    public function testEstimate_2019Light_under_limit()
    {
        $plan = $this->factory->getInstance(PlanFactory::PLAN2019LIGHT_ID);
        $usages = [
            'message_count' => 15000
        ];
        $cost = Estimator::estimate($plan, $usages);
        $this->assertEquals(5000, $cost);
    }

    public function testEstimate_2019Light_over_limit()
    {
        $plan = $this->factory->getInstance(PlanFactory::PLAN2019LIGHT_ID);
        $usages1 = [
            'message_count' => 15001
        ];
        $cost1 = Estimator::estimate($plan, $usages1);
        $this->assertEquals(5000 + 5, $cost1);

        $usages2 = [
            'message_count' => 16000
        ];
        $cost2 = Estimator::estimate($plan, $usages2);
        $this->assertEquals(5000 + 5000, $cost2);
    }

    public function testEstimate_2019Standard_under_limit()
    {
        $plan = $this->factory->getInstance(PlanFactory::PLAN2019STANDARD_ID);
        $usages = [
            'message_count' => 45000
        ];
        $cost = Estimator::estimate($plan, $usages);
        $this->assertEquals(15000, $cost);
    }

    public function testEstimate_2019Standard_over_limit()
    {
        $plan = $this->factory->getInstance(PlanFactory::PLAN2019STANDARD_ID);
        $usages1 = [
            'message_count' => 45001
        ];
        $cost1 = Estimator::estimate($plan, $usages1);
        $this->assertEquals(15000 + 3, $cost1);

        $usages2 = [
            'message_count' => 46000
        ];
        $cost2 = Estimator::estimate($plan, $usages2);
        $this->assertEquals(15000 + 3000, $cost2);

        $usages3 = [
            'message_count' => 145000
        ];
        $cost3 = Estimator::estimate($plan, $usages3);
        $this->assertEquals(15000 + 150000 + 140000, $cost3);
    }
}


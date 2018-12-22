<?php

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

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        // TODO Auto-generated EstimatorTest::setUp()

        $this->estimator = new LineAtCost\Estimator(/* parameters */);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        // TODO Auto-generated EstimatorTest::tearDown()
        $this->estimator = null;

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
     * Tests Estimator::estimate()
     */
    public function testEstimate()
    {
        // TODO Auto-generated EstimatorTest::testEstimate()
        $this->markTestIncomplete("estimate test not implemented");

        LineAtCost\Estimator::estimate(/* parameters */);
    }
}


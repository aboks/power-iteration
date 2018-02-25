<?php
namespace Aboks\PowerIteration\Tests\StoppingCriterion;

use Aboks\PowerIteration\StoppingCriterion\EigenvectorTolerance;
use MathPHP\LinearAlgebra\Matrix;
use MathPHP\LinearAlgebra\Vector;
use PHPUnit\Framework\TestCase;

class EigenvectorToleranceTest extends TestCase
{
    /** @var EigenvectorTolerance */
    private $stopping_criterion;

    protected function setUp()
    {
        $this->stopping_criterion = new EigenvectorTolerance(0.1);
    }

    public function testContinuesIfTheErrorInTheEigenvectorIsMoreThanTheTolerance()
    {
        $matrix = new Matrix([
            [2, 1],
            [1, 2]
        ]);
        $eigenvector_approximation = new Vector([0.6, 0.8]);
        $eigenvalue_approximation = 3;

        $this->assertFalse($this->stopping_criterion->shouldStop(
            41,
            $matrix,
            $eigenvector_approximation,
            $eigenvalue_approximation
        ));
    }

    public function testStopsIfTheErrorInTheEigenvectorIsLessThanTheTolerance()
    {
        $matrix = new Matrix([
            [2, 1],
            [1, 2]
        ]);
        $eigenvector_approximation = new Vector([0.705, 0.71]);
        $eigenvalue_approximation = 3;

        $this->assertTrue($this->stopping_criterion->shouldStop(
            41,
            $matrix,
            $eigenvector_approximation,
            $eigenvalue_approximation
        ));
    }
}

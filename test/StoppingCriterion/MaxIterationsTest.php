<?php
namespace Aboks\PowerIteration\Tests\StoppingCriterion;

use Aboks\PowerIteration\StoppingCriterion\MaxIterations;
use MathPHP\LinearAlgebra\Matrix;
use MathPHP\LinearAlgebra\Vector;
use PHPUnit\Framework\TestCase;

class MaxIterationsTest extends TestCase
{
    /** @var MaxIterations */
    private $stopping_criterion;

    protected function setUp(): void
    {
        $this->stopping_criterion = new MaxIterations(42);
    }

    public function testContinuesIfTheMaximumNumberOfIterationsIsNotReached()
    {
        $matrix = new Matrix([
            [2, 1],
            [1, 2]
        ]);
        $eigenvector_approximation = new Vector([3, 4]);
        $eigenvalue_approximation = 8;

        $this->assertFalse($this->stopping_criterion->shouldStop(
            41,
            $matrix,
            $eigenvector_approximation,
            $eigenvalue_approximation
        ));
    }

    public function testStopsIfTheMaximumNumberOfIterationsIsReached()
    {
        $matrix = new Matrix([
            [2, 1],
            [1, 2]
        ]);
        $eigenvector_approximation = new Vector([3, 4]);
        $eigenvalue_approximation = 8;

        $this->assertTrue($this->stopping_criterion->shouldStop(
            42,
            $matrix,
            $eigenvector_approximation,
            $eigenvalue_approximation
        ));
        $this->assertTrue($this->stopping_criterion->shouldStop(
            43,
            $matrix,
            $eigenvector_approximation,
            $eigenvalue_approximation
        ));
    }
}

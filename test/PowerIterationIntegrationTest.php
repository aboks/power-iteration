<?php
namespace Aboks\PowerIteration\Tests;

use Aboks\PowerIteration\PowerIteration;
use MathPHP\LinearAlgebra\Matrix;
use PHPUnit\Framework\TestCase;

class PowerIterationIntegrationTest extends TestCase
{

    public function testReturnsTheDominantEigenpairForTheGivenMatrix()
    {
        $matrix = new Matrix([
            [2, 1],
            [0, 1]
        ]);
        $power_iteration = new PowerIteration();
        $dominant_eigenpair = $power_iteration->getDominantEigenpair($matrix);
        $this->assertEquals(2, $dominant_eigenpair->getEigenvalue());

        $eigenvector = $dominant_eigenpair->getEigenvector();
        $normalized_eigenvector = $eigenvector->scalarDivide($eigenvector->get(0));
        $this->assertEquals([1, 0], $normalized_eigenvector->getVector());
    }

    public function testScalesTheReturnedEigenvectorApproximation()
    {
        $matrix = new Matrix([
            [2, 1],
            [1, 2]
        ]);
        $power_iteration = new PowerIteration();
        $dominant_eigenpair = $power_iteration->getDominantEigenpair($matrix);
        $this->assertEquals(1, $dominant_eigenpair->getEigenvector()->length());
    }
}

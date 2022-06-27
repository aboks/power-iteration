<?php
namespace Aboks\PowerIteration\Tests;

use Aboks\PowerIteration\PowerIteration;
use MathPHP\LinearAlgebra\MatrixFactory;
use PHPUnit\Framework\TestCase;

class PowerIterationIntegrationTest extends TestCase
{

    public function testReturnsTheDominantEigenpairForTheGivenMatrix()
    {
        $matrix = MatrixFactory::create([
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
        $matrix = MatrixFactory::create([
            [2, 1],
            [1, 2]
        ]);
        $power_iteration = new PowerIteration();
        $dominant_eigenpair = $power_iteration->getDominantEigenpair($matrix);
        $this->assertEquals(1, $dominant_eigenpair->getEigenvector()->length());
    }

    public function testCanReturnTheLeastDominantEigenpairForTheGivenMatrix()
    {
        $matrix = MatrixFactory::create([
            [2, 1],
            [0, 1]
        ]);
        $power_iteration = new PowerIteration();
        $least_dominant_eigenpair = $power_iteration->getLeastDominantEigenpair($matrix);
        $this->assertEquals(1, $least_dominant_eigenpair->getEigenvalue());

        $eigenvector = $least_dominant_eigenpair->getEigenvector();
        $normalized_eigenvector = $eigenvector->scalarDivide($eigenvector->get(0));
        $this->assertEquals([1, -1], $normalized_eigenvector->getVector());
    }
}

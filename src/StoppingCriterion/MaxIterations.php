<?php
namespace Aboks\PowerIteration\StoppingCriterion;

use Aboks\PowerIteration\StoppingCriterion;
use MathPHP\LinearAlgebra\Matrix;
use MathPHP\LinearAlgebra\Vector;

class MaxIterations implements StoppingCriterion
{
    /** @var int */
    private $max_iterations;

    public function __construct(int $max_iterations)
    {
        $this->max_iterations = $max_iterations;
    }

    public function shouldStop(int $iteration, Matrix $matrix, Vector $eigenvector_approximation, float $eigenvalue_approximation): bool
    {
        return $iteration >= $this->max_iterations;
    }
}

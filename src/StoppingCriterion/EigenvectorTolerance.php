<?php
namespace Aboks\PowerIteration\StoppingCriterion;

use Aboks\PowerIteration\StoppingCriterion;
use MathPHP\LinearAlgebra\Matrix;
use MathPHP\LinearAlgebra\Vector;

class EigenvectorTolerance implements StoppingCriterion
{
    /** @var float */
    private $tolerance;

    public function __construct(float $tolerance)
    {
        $this->tolerance = $tolerance;
    }

    public function shouldStop(int $iteration, Matrix $matrix, Vector $eigenvector_approximation, float $eigenvalue_approximation): bool
    {
        $v1 = $matrix->vectorMultiply($eigenvector_approximation);
        $v2 = $eigenvector_approximation->scalarMultiply($eigenvalue_approximation);
        return $v1->subtract($v2)->length() < $this->tolerance;
    }
}

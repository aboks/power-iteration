<?php
namespace Aboks\PowerIteration;

use MathPHP\LinearAlgebra\Matrix;
use MathPHP\LinearAlgebra\Vector;

interface StoppingCriterion
{
    public function shouldStop(int $iteration, Matrix $matrix, Vector $eigenvector_approximation, float $eigenvalue_approximation): bool;
}

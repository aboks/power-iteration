<?php
namespace Aboks\PowerIteration;

use Aboks\PowerIteration\Norm\L2Norm;
use Aboks\PowerIteration\ScalingMethod\NormBased;
use Aboks\PowerIteration\StoppingCriterion\MaxIterations;
use MathPHP\LinearAlgebra\Matrix;
use MathPHP\LinearAlgebra\Vector;

class PowerIteration
{
    /** @var StoppingCriterion */
    private $stopping_criterion;
    /** @var ScalingMethod */
    private $scaling_method;

    public function __construct(?StoppingCriterion $stopping_criterion = null, ?ScalingMethod $scaling_method = null)
    {
        $this->stopping_criterion = $stopping_criterion ?? new MaxIterations(1000);
        $this->scaling_method = $scaling_method ?? new NormBased(new L2Norm());
    }

    public function getDominantEigenpair(Matrix $matrix): Eigenpair
    {
        $eigenvector_approximation = new Vector(array_fill(0, $matrix->getM(), 1));
        $scaled_eigenvector_approximation = $this->scaling_method->scale($eigenvector_approximation);
        $eigenvalue_approximation = 1;

        $iteration = 0;
        while (!$this->stopping_criterion->shouldStop(
            $iteration,
            $matrix,
            $scaled_eigenvector_approximation,
            $eigenvalue_approximation
        )) {
            $eigenvector_approximation = $matrix->vectorMultiply($scaled_eigenvector_approximation);
            $eigenvalue_approximation = RayleighQuotient::of($matrix, $eigenvector_approximation);
            $scaled_eigenvector_approximation = $this->scaling_method->scale($eigenvector_approximation);

            $iteration++;
        }

        return new Eigenpair($eigenvalue_approximation, $scaled_eigenvector_approximation);
    }
}

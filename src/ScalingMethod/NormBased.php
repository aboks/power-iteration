<?php
namespace Aboks\PowerIteration\ScalingMethod;

use Aboks\PowerIteration\Norm;
use Aboks\PowerIteration\ScalingMethod;
use MathPHP\LinearAlgebra\Vector;

class NormBased implements ScalingMethod
{
    /** @var Norm */
    private $norm;

    public function __construct(Norm $norm)
    {
        $this->norm = $norm;
    }

    public function scale(Vector $vector): Vector
    {
        return $vector->scalarDivide($this->norm->normOf($vector));
    }
}

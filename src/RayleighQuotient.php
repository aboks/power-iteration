<?php
namespace Aboks\PowerIteration;

use MathPHP\LinearAlgebra\Matrix;
use MathPHP\LinearAlgebra\Vector;

class RayleighQuotient
{
    public static function of(Matrix $A, Vector $v)
    {
        return $v->dotProduct($A->vectorMultiply($v)) / $v->dotProduct($v);
    }
}

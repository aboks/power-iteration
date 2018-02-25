<?php
namespace Aboks\PowerIteration\Norm;

use Aboks\PowerIteration\Norm;
use MathPHP\LinearAlgebra\Vector;

class L1Norm implements Norm
{
    public function normOf(Vector $vector): float
    {
        return $vector->l1Norm();
    }
}

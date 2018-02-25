<?php
namespace Aboks\PowerIteration\Norm;

use Aboks\PowerIteration\Norm;
use MathPHP\LinearAlgebra\Vector;

class L2Norm implements Norm
{
    public function normOf(Vector $vector): float
    {
        return $vector->l2Norm();
    }
}

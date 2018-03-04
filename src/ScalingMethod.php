<?php
namespace Aboks\PowerIteration;

use MathPHP\LinearAlgebra\Vector;

interface ScalingMethod
{
    public function scale(Vector $vector): Vector;
}

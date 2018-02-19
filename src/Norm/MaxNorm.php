<?php
namespace Aboks\PowerIteration\Norm;

use Aboks\PowerIteration\Norm;
use MathPHP\LinearAlgebra\Vector;

class MaxNorm implements Norm {
	public function normOf(Vector $vector): float {
		return $vector->maxNorm();
	}
}
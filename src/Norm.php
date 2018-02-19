<?php
namespace Aboks\PowerIteration;

use MathPHP\LinearAlgebra\Vector;

interface Norm {
	public function normOf(Vector $vector): float;
}
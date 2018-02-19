<?php
namespace Aboks\PowerIteration\Tests;

use Aboks\PowerIteration\RayleighQuotient;
use MathPHP\LinearAlgebra\Matrix;
use MathPHP\LinearAlgebra\Vector;
use PHPUnit\Framework\TestCase;

class RayleighQuotientTest extends TestCase {
	public function testCalculatesTheRayleighQuotientOfAMatrixAndAVector() {
		$A = new Matrix([
			[1, 2, 0],
			[-2, 1, 2],
			[1, 3, 1],
		]);
		$v = new Vector([0.5, 0.5, 1]);

		$this->assertEquals(3, RayleighQuotient::of($A, $v));
	}
}
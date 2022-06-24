<?php
namespace Aboks\PowerIteration\Tests;

use Aboks\PowerIteration\RayleighQuotient;
use MathPHP\LinearAlgebra\MatrixFactory;
use MathPHP\LinearAlgebra\Vector;
use PHPUnit\Framework\TestCase;

class RayleighQuotientTest extends TestCase
{
    public function testCalculatesTheRayleighQuotientOfAMatrixAndAVector()
    {
        $A = MatrixFactory::create([
            [1, 2, 0],
            [-2, 1, 2],
            [1, 3, 1],
        ]);
        $v = new Vector([0.5, 0.5, 1]);

        $this->assertEquals(3, RayleighQuotient::of($A, $v));
    }
}

<?php
namespace Aboks\PowerIteration\Tests\Norm;

use Aboks\PowerIteration\Norm\MaxNorm;
use MathPHP\LinearAlgebra\Vector;
use PHPUnit\Framework\TestCase;

class MaxNormTest extends TestCase
{
    /** @var MaxNorm */
    private $max_norm;

    protected function setUp()
    {
        $this->max_norm = new MaxNorm();
    }

    public function testReturnsTheMaxNormOfAVector()
    {
        $v = new Vector([3, 1]);
        $this->assertEquals(3, $this->max_norm->normOf($v));
    }
}

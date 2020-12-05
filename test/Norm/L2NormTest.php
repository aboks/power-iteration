<?php
namespace Aboks\PowerIteration\Tests\Norm;

use Aboks\PowerIteration\Norm\L2Norm;
use MathPHP\LinearAlgebra\Vector;
use PHPUnit\Framework\TestCase;

class L2NormTest extends TestCase
{
    /** @var L2Norm */
    private $l2norm;

    protected function setUp(): void
    {
        $this->l2norm = new L2Norm();
    }

    public function testReturnsTheL2NormOfAVector()
    {
        $v = new Vector([1, 1]);
        $this->assertEquals(sqrt(2), $this->l2norm->normOf($v));
    }
}

<?php
namespace Aboks\PowerIteration\Tests\Norm;

use Aboks\PowerIteration\Norm\L1Norm;
use MathPHP\LinearAlgebra\Vector;
use PHPUnit\Framework\TestCase;

class L1NormTest extends TestCase
{
    /** @var L1Norm */
    private $l1norm;

    protected function setUp(): void
    {
        $this->l1norm = new L1Norm();
    }

    public function testReturnsTheL2NormOfAVector()
    {
        $v = new Vector([1, -1]);
        $this->assertEquals(2, $this->l1norm->normOf($v));
    }
}

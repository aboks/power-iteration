<?php
namespace Aboks\PowerIteration\Tests\ScalingMethod;

use Aboks\PowerIteration\Norm;
use Aboks\PowerIteration\ScalingMethod\NormBased;
use MathPHP\LinearAlgebra\Vector;
use PHPUnit\Framework\TestCase;

class NormBasedTest extends TestCase {
	/** @var Norm|\PHPUnit_Framework_MockObject_MockObject */
	private $norm;
	/** @var NormBased */
	private $scaling_method;

	protected function setUp() {
		$this->norm = $this->createMock(Norm::class);
		$this->scaling_method = new NormBased($this->norm);
	}

	public function testScalesTheVectorByTheInverseOfItsNorm() {
		$v = new Vector([1, 42, 4, 14,]);

		$this->norm->expects($this->any())
			->method('normOf')
			->with($this->identicalTo($v))
			->will($this->returnValue(2));

		$v_scaled = $this->scaling_method->scale($v);
		$this->assertEquals([0.5, 21, 2, 7], $v_scaled->getVector());
	}
}
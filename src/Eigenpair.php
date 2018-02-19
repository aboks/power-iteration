<?php
namespace Aboks\PowerIteration;

use MathPHP\LinearAlgebra\Vector;

class Eigenpair {
	/** @var float */
	private $eigenvalue;
	/** @var Vector */
	private $eigenvector;

	public function __construct(float $eigenvalue, Vector $eigenvector) {
		$this->eigenvalue = $eigenvalue;
		$this->eigenvector = $eigenvector;
	}

	public function getEigenvalue(): float {
		return $this->eigenvalue;
	}

	public function getEigenvector(): Vector {
		return $this->eigenvector;
	}
}
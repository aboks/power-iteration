[![Build Status](https://travis-ci.org/aboks/power-iteration.svg?branch=master)](https://travis-ci.org/aboks/power-iteration)
[![Latest Stable Version](https://poser.pugx.org/aboks/power-iteration/v/stable)](https://packagist.org/packages/aboks/power-iteration)

PowerIteration
==============
Implementation of the Power Iteration method for finding (dominant) eigenvalues and the corresponding eigenvectors of a matrix, using the excellent [math-php](https://github.com/markrogoyski/math-php) library.
 
Installation
------------
Install using composer:
```
$ composer require aboks/power-iteration
```

Basic usage
-----------
```php
<?php
use Aboks\PowerIteration\PowerIteration;
use MathPHP\LinearAlgebra\Matrix;

$power_iteration = new PowerIteration();
$dominant_eigenpair = $power_iteration->getDominantEigenpair(new Matrix([
    [2, 1],
    [0, 1]
 ]));
var_dump($dominant_eigenpair->getEigenvalue()); // 2
var_dump($dominant_eigenpair->getEigenvector()); // Vector([1, 0]), or a scalar multiple
```

Running tests
-------------
After installing dependencies (including development dependencies) using Composer, run
```
$ ./vendor/bin/phpunit
```
from the project root dir.

Versioning
----------
This project adheres to [Semantic Versioning](http://semver.org/).

License
-------
The code is released under the MIT license.

![Continuous Integration](https://github.com/aboks/power-iteration/workflows/Continuous%20Integration/badge.svg)
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
use MathPHP\LinearAlgebra\MatrixFactory;

$power_iteration = new PowerIteration();
$dominant_eigenpair = $power_iteration->getDominantEigenpair(MatrixFactory::create([
    [2, 1],
    [0, 1]
 ]));
var_dump($dominant_eigenpair->getEigenvalue()); // 2
var_dump($dominant_eigenpair->getEigenvector()); // Vector([1, 0]), or a scalar multiple
```

Advanced usage
--------------

### Calculating the least dominant eigenpair

In most situations, one is interested in the dominant eigenvalue and its corresponding eigenvector. It is also possible to calculate the least dominant eigenpair however: 
```php
<?php
use Aboks\PowerIteration\PowerIteration;
use MathPHP\LinearAlgebra\Matrix;

$power_iteration = new PowerIteration();
$dominant_eigenpair = $power_iteration->getLeastDominantEigenpair(MatrixFactory::create([
    [2, 1],
    [0, 1]
 ]));
var_dump($dominant_eigenpair->getEigenvalue()); // 1
var_dump($dominant_eigenpair->getEigenvector()); // Vector([√2, -√2]), or a scalar multiple
```


Customizations
--------------

### Stopping criterion

By default, the power iteration runs for 1000 iterations. The stopping criterion can be altered by passing an instance of `StoppingCriterion` as the first argument to `PowerIteration`:
```php
<?php
use Aboks\PowerIteration\PowerIteration;
use Aboks\PowerIteration\StoppingCriterion\MaxIterations;
use Aboks\PowerIteration\StoppingCriterion\EigenvectorTolerance;

new PowerIteration(new MaxIterations(10));           // will stop after 10 iterations
new PowerIteration(new EigenvectorTolerance(0.01));  // will stop when ‖Av - λv‖ < 0.01
```

### Scaling method

To prevent overflow in case of very large eigenvalues (or underflow in case of small eigenvalues), the eigenvector estimates are scaled/normalized after each iteration. The final eigenvector estimate is also scaled using the same method. By default, the estimates are scaled to a unit vector based on the L2-norm. To use a different method, provide an instance of `ScalingMethod` as a second argument to `PowerIteration`:
```php
<?php
use Aboks\PowerIteration\PowerIteration;
use Aboks\PowerIteration\ScalingMethod\NormBased;
use Aboks\PowerIteration\Norm\MaxNorm;

new PowerIteration(null, new NormBased(new MaxNorm()));  // will scale to a unit vector based on the max-norm
``` 

Running tests
-------------
After installing dependencies (including development dependencies) using Composer, run
```
$ ./vendor/bin/phpunit
```
from the project root dir.

Contributing
------------
Contributions to this library are very welcome! Please make sure that your changes have sufficient test coverage, and that the code follows [PSR-2](https://www.php-fig.org/psr/psr-2/).

Versioning
----------
This project adheres to [Semantic Versioning](http://semver.org/).

License
-------
The code is released under the MIT license.

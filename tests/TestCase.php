<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Class TestCase
 * ----
 * The base class for the testing in the system. 
 * 
 * @author      Tim Joosten <tim@activisme.>
 * @copyright   2018 Activisme_BE
 * @package     Tests
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
}

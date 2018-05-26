<?php

namespace Tests\Feature\Categories;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class StoreMethodTest 
 * ---- 
 * PHPUnit testcase for testing out the validation and store operation from a privacy concern category. 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     Tests\Feature\Categories
 */
class StoreMethodTest extends TestCase
{
    use RefreshDatabase, WithFaker;
}

<?php

namespace Tests\Feature\Categories;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class CreateViewTest
 * ---- 
 * PHPUnit testcase for testing out the view for creating a new privacy concern category. 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     Tests\Feature\Categories
 */
class CreateViewTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @testdox Test that a unauthenticated user can't view the page.
     */
    public function notAuthenticated(): void 
    {

    }
    
    /**
     * @test
     * @testdox Test if a user with correct permissions can view the page without errors.
     */
    public function success(): void 
    {

    }

    /**
     * @test
     * @testdox Test if a user with incorrect permissions can't view the page.
     */
    public function incorrectRole(): void 
    {

    }
}

<?php

namespace Tests\Feature\Categories;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\CreatesUser;
use Illuminate\Http\Response;

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
    use RefreshDatabase, WithFaker, CreatesUser; 

    /**
     * @test
     * @testdox Test is the request can't perfom without any authenticated user 
     */
    public function unauthenticated(): void 
    {
        $this->post(route('categories.store'), ['name' => $this->faker->name, 'description' => $this->faker->text])
            ->assertStatus(Response::HTTP_FOUND) // Code: 302
            ->assertRedirect(route('login'));
    }

    /**
     * @test
     * @testdox Test that a user with incorrect role can't store the new category
     */
    public function incorrectRole(): void 
    {
        $this->actingAs($this->createUser('user'))
            ->post(route('categories.store'), ['name' => $this->faker->name, 'description' => $this->faker->text])
            ->assertStatus(Response::HTTP_FORBIDDEN); // Code: 403
    }

    /**
     * @test
     * @testdox Test that a authorized user can store the category in the database
     */
    public function succes(): void 
    {
        $user  = $this->createUser('admin');
        $input = ['name' => $this->faker->name, 'description' => $this->faker->text];

        $this->actingAs($user)
            ->post(route('categories.store'), $input)
            ->assertStatus(Response::HTTP_FOUND) // Code: 302
            ->assertRedirect(route('privacy.categories.index'))
            ->assertSessionHas([
                'toastr::messages.0.type'    => 'success',
                'toastr::messages.0.message' => __('categories.toastr.store.message', ['title' => $input['name'], 'module' => 'privcay']),
                'toastr::messages.0.title'   => __('categories.toastr.store.title')
           ]); 

        $this->assertDatabaseHas('categories', array_merge(['author_id' => $user->id, 'module' => 'privacy'], $input));
    }

    /**
     * @test
     * @testdox Test if the name field in the form is required
     */
    public function validationNameRequired(): void 
    {
        $this->actingAs($this->createUser('admin'))
            ->post(route('categories.store'), ['description' => $this->faker->text])
            ->assertStatus(Response::HTTP_FOUND) // Code: 302
            ->assertSessionHasErrors(['name' => __('validation.required', ['attribute' => 'name'])]);
    }

    /**
     * @test
     * @testdox Test if the name field only can contain a string data type
     */
    public function validationNameString(): void 
    {
        $this->actingAs($this->createUser('admin'))
            ->post(route('categories.store'), ['name' => rand(0, 12), 'description' => $this->faker->text])
            ->assertStatus(Response::HTTP_FOUND) // Code: 302
            ->assertSessionHasErrors(['name' => __('validation.string', ['attribute' => 'name'])]);
    }

    /**
     * @test
     * @testdox Test that the name can contain max 191 characters
     */
    public function validationNameMax191(): void
    {
        $this->actingAs($this->createUser('admin'))
            ->post(route('categories.store'), ['name' => str_random(240), 'description' => $this->faker->text])
            ->assertStatus(Response::HTTP_FOUND) // Code: 302
            ->assertSessionHasErrors(['name' => __('validation.max.string', [
                'max' => 191, 'attribute' => 'name'
            ])]);
    }

    /**
     * @test
     * @testdox Test of the description field is required in the form.
     */
    public function validationDescriptionRequired(): void
    {
        $this->actingAs($this->createUser('admin'))
            ->post(route('categories.store'), ['name' => $this->faker->text])
            ->assertStatus(Response::HTTP_FOUND) // Code: 302
            ->assertSessionHasErrors(['description' => __('validation.required', ['attribute' => 'description'])]);
    }
}

<?php

namespace Tests;

use Illuminate\Testing\Fluent\AssertableJson as Assert;
use PHPUnit\Framework\AssertionFailedError;

class AssertableJsonEnhancerTest extends TestCase
{
    public function test_where_value_contains_should_be_true(): void
    {
        app('router')->get('/', fn () => ['name' => 'Wheesnoza assertable json enhancer.']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(fn (Assert $json) => $json
            ->whereValueContains('name', 'assertable')
            ->etc()
        );
    }

    public function test_where_value_contains_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);
        
        app('router')->get('/', fn () => ['name' => 'Wheesnoza json enhancer.']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(fn (Assert $json) => $json
            ->whereValueContains('name', 'assertable')
            ->etc()
        );
    }

    public function test_where_greater_than_should_be_true(): void
    {
        app('router')->get('/', fn () => ['number' => 11]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(fn (Assert $json) => $json
            ->whereGreaterThan('number', 10)
            ->etc()
        );
    }

    public function test_where_greater_than_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);
        
        app('router')->get('/', fn () => ['number' => 10]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(fn (Assert $json) => $json
            ->whereGreaterThan('number', 10)
            ->etc()
        );
    }

    public function test_where_greater_than_or_equal_should_be_true(): void
    {
        app('router')->get('/', fn () => ['number1' => 10, 'number2' => 11]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(fn (Assert $json) => $json
            ->whereGreaterThanOrEqual('number1', 10)
            ->whereGreaterThanOrEqual('number2', 12)
            ->etc()
        );
    }

    public function test_where_greater_than_or_equal_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);
        
        app('router')->get('/', fn () => ['number1' => 10]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(fn (Assert $json) => $json
            ->whereGreaterThanOrEqual('number1', 9)
            ->etc()
        );
    }

    public function test_where_is_array_should_be_true(): void
    {
        app('router')->get('/', fn () => ['products' => ['a', 'b', 'c']]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(fn (Assert $json) => $json
            ->whereIsArray('products')
            ->etc()
        );
    }

    public function test_where_is_array_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);

        app('router')->get('/', fn () => ['products' => 'a']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(fn (Assert $json) => $json
            ->whereIsArray('products')
            ->etc()
        );
    }

    public function test_where_array_has_at_least_should_be_true(): void
    {
        app('router')->get('/', fn () => ['products' => ['a', 'b', 'c']]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(fn (Assert $json) => $json
            ->whereArrayHasAtLeast('products', 3)
            ->etc()
        );
    }

    public function test_where_array_has_at_least_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);

        app('router')->get('/', fn () => ['products' => ['a', 'b', 'c']]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(fn (Assert $json) => $json
            ->whereArrayHasAtLeast('products', 4)
            ->etc()
        );
    }

    public function test_where_matches_pattern_should_be_true(): void
    {
        app('router')->get('/', fn () => ['email' => 'ezample@example.com']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(fn (Assert $json) => $json
            ->whereMatchesPattern('email', '/^[\w\.-]+@[\w\.-]+\.\w{2,4}$/')
            ->etc()
        );
    }

    public function test_where_matches_pattern_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);

        app('router')->get('/', fn () => ['email' => 'example.com']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(fn (Assert $json) => $json
            ->whereMatchesPattern('email', '/^[\w\.-]+@[\w\.-]+\.\w{2,4}$/')
            ->etc()
        );
    }
}
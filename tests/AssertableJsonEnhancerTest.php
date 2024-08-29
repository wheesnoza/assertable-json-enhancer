<?php

namespace Tests;

use Illuminate\Testing\Fluent\AssertableJson as Assert;
use PHPUnit\Framework\AssertionFailedError;

class AssertableJsonEnhancerTest extends TestCase
{
    public function test_where_string_contains_should_be_true(): void
    {
        app('router')->get('/', fn () => ['name' => 'Wheesnoza assertable json enhancer.']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereStringContains('name', 'assertable')
            ->etc()
        );
    }

    public function test_where_string_contains_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);

        app('router')->get('/', fn () => ['name' => 'Wheesnoza json enhancer.']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereStringContains('name', 'assertable')
            ->etc()
        );
    }

    public function test_where_less_than_should_be_true(): void
    {
        app('router')->get('/', fn () => ['number' => 10]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereLessThan('number', 11)
            ->etc()
        );
    }

    public function test_where_less_than_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);

        app('router')->get('/', fn () => ['number' => 10]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereLessThan('number', 10)
            ->etc()
        );
    }

    public function test_where_less_than_or_equal_should_be_true(): void
    {
        app('router')->get('/', fn () => ['number1' => 10, 'number2' => 11]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereLessThanOrEqual('number1', 10)
            ->whereLessThanOrEqual('number2', 11)
            ->etc()
        );
    }

    public function test_where_less_than_or_equal_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);

        app('router')->get('/', fn () => ['number1' => 10]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereLessThanOrEqual('number1', 9)
            ->etc()
        );
    }

    public function test_where_greater_than_should_be_true(): void
    {
        app('router')->get('/', fn () => ['number' => 11]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
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

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereGreaterThan('number', 10)
            ->etc()
        );
    }

    public function test_where_greater_than_or_equal_should_be_true(): void
    {
        app('router')->get('/', fn () => ['number1' => 10, 'number2' => 12]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
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

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereGreaterThanOrEqual('number1', 9)
            ->etc()
        );
    }

    public function test_where_is_array_should_be_true(): void
    {
        app('router')->get('/', fn () => ['products' => ['a', 'b', 'c']]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
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

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereIsArray('products')
            ->etc()
        );
    }

    public function test_where_array_has_at_least_should_be_true(): void
    {
        app('router')->get('/', fn () => ['products' => ['a', 'b', 'c']]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereArrayHasAtLeast('products', 3)
            ->etc()
        );
    }

    public function test_where_array_has_at_least_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);

        app('router')->get('/', fn () => ['products' => ['a', 'b']]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereArrayHasAtLeast('products', 3)
            ->etc()
        );
    }

    public function test_where_array_has_size_should_be_true(): void
    {
        app('router')->get('/', fn () => ['items' => ['a', 'b', 'c']]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereArrayHasSize('items', 3)
            ->etc()
        );
    }

    public function test_where_array_has_size_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);

        app('router')->get('/', fn () => ['items' => ['a', 'b']]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereArrayHasSize('items', 3)
            ->etc()
        );
    }

    public function test_where_string_starts_with_should_be_true(): void
    {
        app('router')->get('/', fn () => ['name' => 'Laravel is awesome']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereStringStartsWith('name', 'Laravel')
            ->etc()
        );
    }

    public function test_where_string_starts_with_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);

        app('router')->get('/', fn () => ['name' => 'Laravel is awesome']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereStringStartsWith('name', 'Symfony')
            ->etc()
        );
    }

    public function test_where_string_ends_with_should_be_true(): void
    {
        app('router')->get('/', fn () => ['name' => 'Laravel is awesome']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereStringEndsWith('name', 'awesome')
            ->etc()
        );
    }

    public function test_where_string_ends_with_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);

        app('router')->get('/', fn () => ['name' => 'Laravel is awesome']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereStringEndsWith('name', 'terrible')
            ->etc()
        );
    }

    public function test_where_exact_length_should_be_true(): void
    {
        app('router')->get('/', fn () => ['name' => 'Laravel']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereExactLength('name', 7)
            ->etc()
        );
    }

    public function test_where_exact_length_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);

        app('router')->get('/', fn () => ['name' => 'Laravel']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereExactLength('name', 6)
            ->etc()
        );
    }

    public function test_where_matches_pattern_should_be_true(): void
    {
        app('router')->get('/', fn () => ['email' => 'example@example.com']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
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

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereMatchesPattern('email', '/^[\w\.-]+@[\w\.-]+\.\w{2,4}$/')
            ->etc()
        );
    }

    public function test_where_is_string_should_be_true(): void
    {
        app('router')->get('/', fn () => ['name' => 'Laravel']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereIsString('name')
            ->etc()
        );
    }

    public function test_where_is_string_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);

        app('router')->get('/', fn () => ['name' => 123]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereIsString('name')
            ->etc()
        );
    }

    public function test_where_is_integer_should_be_true(): void
    {
        app('router')->get('/', fn () => ['count' => 123]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereIsInteger('count')
            ->etc()
        );
    }

    public function test_where_is_integer_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);

        app('router')->get('/', fn () => ['count' => '123']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereIsInteger('count')
            ->etc()
        );
    }

    public function test_where_is_boolean_should_be_true(): void
    {
        app('router')->get('/', fn () => ['active' => true]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereIsBoolean('active')
            ->etc()
        );
    }

    public function test_where_is_boolean_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);

        app('router')->get('/', fn () => ['active' => 1]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereIsBoolean('active')
            ->etc()
        );
    }

    public function test_where_is_float_should_be_true(): void
    {
        app('router')->get('/', fn () => ['price' => 12.34]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereIsFloat('price')
            ->etc()
        );
    }

    public function test_where_is_float_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);

        app('router')->get('/', fn () => ['price' => '12.34']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereIsFloat('price')
            ->etc()
        );
    }

    public function test_where_is_empty_should_be_true(): void
    {
        app('router')->get('/', fn () => ['name' => '']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereIsEmpty('name')
            ->etc()
        );
    }

    public function test_where_is_empty_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);

        app('router')->get('/', fn () => ['name' => 'Laravel']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereIsEmpty('name')
            ->etc()
        );
    }

    public function test_where_is_not_empty_should_be_true(): void
    {
        app('router')->get('/', fn () => ['name' => 'Laravel']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereIsNotEmpty('name')
            ->etc()
        );
    }

    public function test_where_is_not_empty_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);

        app('router')->get('/', fn () => ['name' => '']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereIsNotEmpty('name')
            ->etc()
        );
    }

    public function test_where_string_equals_should_be_true(): void
    {
        app('router')->get('/', fn () => ['name' => 'Laravel']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereStringEquals('name', 'Laravel')
            ->etc()
        );
    }

    public function test_where_string_equals_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);

        app('router')->get('/', fn () => ['name' => 'Laravel']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereStringEquals('name', 'Symfony')
            ->etc()
        );
    }

    public function test_where_string_not_equals_should_be_true(): void
    {
        app('router')->get('/', fn () => ['name' => 'Laravel']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereStringNotEquals('name', 'Symfony')
            ->etc()
        );
    }

    public function test_where_string_not_equals_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);

        app('router')->get('/', fn () => ['name' => 'Laravel']);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereStringNotEquals('name', 'Laravel')
            ->etc()
        );
    }

    public function test_where_results_are_ordered_by_should_be_true(): void
    {
        app('router')->get('/', fn () => ['data' => [['id' => 1], ['id' => 2], ['id' => 3]]]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereResultsAreOrderedBy('data', 'id', 'asc')
            ->etc()
        );
    }

    public function test_where_results_are_ordered_by_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);

        app('router')->get('/', fn () => ['data' => [['id' => 3], ['id' => 2], ['id' => 1]]]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereResultsAreOrderedBy('data', 'id', 'asc')
            ->etc()
        );
    }

    public function test_where_results_contain_should_be_true(): void
    {
        app('router')->get('/', fn () => ['data' => [1, 2, 3]]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereResultsContain('data', 2)
            ->etc()
        );
    }

    public function test_where_results_contain_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);

        app('router')->get('/', fn () => ['data' => [1, 2, 3]]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereResultsContain('data', 4)
            ->etc()
        );
    }

    public function test_where_results_match_criteria_should_be_true(): void
    {
        app('router')->get('/', fn () => ['data' => [
            ['id' => 1, 'name' => 'Laravel', 'version' => 11],
        ]]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereResultsMatchCriteria('data', ['name' => 'Laravel', 'version' => 11])
            ->etc()
        );
    }

    public function test_where_results_match_criteria_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);

        app('router')->get('/', fn () => ['data' => [
            ['id' => 1, 'name' => 'Laravel'],
            ['id' => 2, 'name' => 'Symfony'],
        ]]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereResultsMatchCriteria('data', ['name' => 'CodeIgniter'])
            ->etc()
        );
    }

    public function test_where_results_match_criteria_with_partial_match_should_be_true(): void
    {
        app('router')->get('/', fn () => ['data' => [
            ['id' => 1, 'name' => 'Laravel Eloquent'],
            ['id' => 2, 'name' => 'QueryBuilder Laravel'],
        ]]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereResultsMatchCriteria('data', ['name' => 'Laravel'], true)
            ->etc()
        );
    }

    public function test_where_results_match_criteria_with_partial_match_should_be_false(): void
    {
        $this->expectException(AssertionFailedError::class);

        app('router')->get('/', fn () => ['data' => [
            ['id' => 1, 'name' => 'Symfony Framework'],
            ['id' => 2, 'name' => 'CodeIgniter'],
        ]]);

        $response = $this->get('/');

        $response->assertOk();

        $response->assertJson(
            fn (Assert $json) => $json
            ->whereResultsMatchCriteria('data', ['name' => 'Laravel'], true)
            ->etc()
        );
    }
}

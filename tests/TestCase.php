<?php

namespace Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use AssertableJsonEnhancer\ServiceProvider as AssertableJsonEnhancerServiceProvider;
use Illuminate\Testing\TestResponse;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            AssertableJsonEnhancerServiceProvider::class
        ];
    }

    /**
     * @param array<mixed> $response
     */
    protected function makeMockRequest(array $response): TestResponse
    {
        app('router')->get('/', fn () => $response);

        return $this->get('/');
    }
}
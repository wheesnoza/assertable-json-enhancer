<?php

namespace Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use AssertableJsonEnhancer\ServiceProvider as AssertableJsonEnhancerServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            AssertableJsonEnhancerServiceProvider::class
        ];
    }

    protected function makeMockRequest($response)
    {
        app('router')->get('/', fn () => $response);

        return $this->get('/');
    }
}
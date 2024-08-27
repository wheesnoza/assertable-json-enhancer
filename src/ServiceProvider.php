<?php

namespace AssertableJsonEnhancer;


use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Testing\Fluent\AssertableJson;

class ServiceProvider extends BaseServiceProvider
{
    public function boot(): void
    {
        AssertableJson::mixin(new AssertableJsonEnhancer);
    }
}

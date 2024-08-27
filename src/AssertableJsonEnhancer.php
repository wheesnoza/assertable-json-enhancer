<?php

namespace AssertableJsonEnhancer;

use PHPUnit\Framework\Assert;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class AssertableJsonEnhancer
{
    public function whereValueContains() {
        return function (string $key, string $value) {
            $property = $this->prop($key);

            $assertion = Str::of($property)->contains($value);

            Assert::assertTrue($assertion, sprintf("[%s] did not contain [%s].", $property, $value));

            return $this;
        };
    }

    public function whereGreaterThan() {
        return function (string $key, int $value) {
            $property = $this->prop($key);

            Assert::assertGreaterThan($value, $property, sprintf("%s is not greater than %d", $key, $value));

            return $this;
        };
    }

    public function whereGreaterThanOrEqual() {
        return function (string $key, int $value) {
            $property = $this->prop($key);

            Assert::assertGreaterThanOrEqual($property, $value, sprintf("%s with value of %d is not equal to %d or greater than %d", $key, $property, $value, $value));

            return $this;
        };
    }
}
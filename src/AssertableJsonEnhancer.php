<?php

namespace AssertableJsonEnhancer;

use PHPUnit\Framework\Assert;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\AssertableJson;

class AssertableJsonEnhancer
{
    public function whereValueContains()
    {
        return function (string $key, string $value) {
            /** @var AssertableJson $this */
            $property = $this->prop($key);

            $assertion = Str::of($property)->contains($value);

            Assert::assertTrue($assertion, sprintf("[%s] did not contain [%s].", $property, $value));

            return $this;
        };
    }

    public function whereGreaterThan()
    {
        return function (string $key, int $value) {
            /** @var AssertableJson $this */
            $property = $this->prop($key);

            Assert::assertGreaterThan($value, $property, sprintf("%s is not greater than %d", $key, $value));

            return $this;
        };
    }

    public function whereGreaterThanOrEqual()
    {
        return function (string $key, int $value) {
            /** @var AssertableJson $this */
            $property = $this->prop($key);

            Assert::assertGreaterThanOrEqual($property, $value, sprintf("%s with value of %d is not equal to %d or greater than %d", $key, $property, $value, $value));

            return $this;
        };
    }

    public function whereIsArray()
    {
        return function (string $key) {
            /** @var AssertableJson $this */
            $property = $this->prop($key);

            Assert::assertIsArray($property, sprintf("%s are not an array.", $key));

            return $this;
        };
    }

    public function whereArrayHasAtLeast()
    {
        return function (string $key, int $minCount) {
            /** @var AssertableJson $this */
            $property = $this->prop($key);

            Assert::assertTrue(
                is_array($property) && count($property) >= $minCount,
                sprintf("%s are less than %d.", $key, $minCount)
            );

            return $this;
        };
    }

    public function whereMatchesPattern()
    {
        return function (string $key, string $pattern) {
            /** @var AssertableJson $this */
            $property = $this->prop($key);

            Assert::assertMatchesRegularExpression(
                $pattern,
                $property,
                sprintf("%s do not match regular expresions.", $key)
            );

            return $this;
        };
    }
}

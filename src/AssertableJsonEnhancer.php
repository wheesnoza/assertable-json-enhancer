<?php

namespace AssertableJsonEnhancer;

use Closure;
use PHPUnit\Framework\Assert;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\AssertableJson;

class AssertableJsonEnhancer
{
    /**
     * Asserts that the string at the given key contains the specified substring.
     */
    public function whereStringContains(): Closure
    {
        return function (string $key, string $substring) {
            /**
             * @var AssertableJson $this
             * @phpstan-ignore-next-line
             */
            $property = $this->prop($key);

            $assertion = Str::contains($property, $substring);

            Assert::assertTrue(
                $assertion,
                sprintf("%s does not contain the substring '%s'.", $key, $substring)
            );

            return $this;
        };
    }

    /**
     * Asserts that the value at the given key is less than the specified value.
     */
    public function whereLessThan(): Closure
    {
        return function (string $key, int $value) {
            /**
             * @var AssertableJson $this
             * @phpstan-ignore-next-line
             */
            $property = $this->prop($key);
            Assert::assertLessThan(
                $value,
                $property,
                sprintf("%s is not less than %d", $key, $value)
            );

            return $this;
        };
    }

    /**
     * Asserts that the value at the given key is less than or equal to the specified value.
     */
    public function whereLessThanOrEqual(): Closure
    {
        return function (string $key, int $value) {
            /**
             * @var AssertableJson $this
             * @phpstan-ignore-next-line
             */
            $property = $this->prop($key);
            Assert::assertLessThanOrEqual(
                $value,
                $property,
                sprintf("%s with value of %d is not equal to %d or less than %d", $key, $property, $value, $value)
            );

            return $this;
        };
    }

    /**
     * Asserts that the value at the given key is greater than the specified value.
     */
    public function whereGreaterThan(): Closure
    {
        return function (string $key, int $value) {
            /**
             * @var AssertableJson $this
             * @phpstan-ignore-next-line
             */
            $property = $this->prop($key);

            Assert::assertGreaterThan(
                $value,
                $property,
                sprintf("%s is not greater than %d", $key, $value)
            );

            return $this;
        };
    }

    /**
     * Asserts that the value at the given key is greater than or equal to the specified value.
     */
    public function whereGreaterThanOrEqual(): Closure
    {
        return function (string $key, int $value) {
            /**
             * @var AssertableJson $this
             * @phpstan-ignore-next-line
             */
            $property = $this->prop($key);

            Assert::assertGreaterThanOrEqual(
                $property,
                $value,
                sprintf("%s with value of %d is not equal to %d or greater than %d", $key, $property, $value, $value)
            );

            return $this;
        };
    }

    /**
     * Asserts that the value at the given key is an array.
     */
    public function whereIsArray(): Closure
    {
        return function (string $key) {
            /**
             * @var AssertableJson $this
             * @phpstan-ignore-next-line
             */
            $property = $this->prop($key);

            Assert::assertIsArray(
                $property,
                sprintf("%s are not an array.", $key)
            );

            return $this;
        };
    }

    /**
     * Asserts that the array at the given key has at least the specified number of elements.
     */
    public function whereArrayHasAtLeast(): Closure
    {
        return function (string $key, int $minCount) {
            /**
             * @var AssertableJson $this
             * @phpstan-ignore-next-line
             */
            $property = $this->prop($key);

            $assertion = is_array($property) && count($property) >= $minCount;

            Assert::assertTrue(
                $assertion,
                sprintf("%s are less than %d.", $key, $minCount)
            );

            return $this;
        };
    }

    /**
     * Asserts that the array at the given key has exactly the specified number of elements.
     */
    public function whereArrayHasSize(): Closure
    {
        return function (string $key, int $size) {
            /**
             * @var AssertableJson $this
             * @phpstan-ignore-next-line
             */
            $property = $this->prop($key);

            Assert::assertCount(
                $size,
                $property,
                sprintf("%s does not have %d elements.", $key, $size)
            );

            return $this;
        };
    }

    /**
     * Asserts that the string at the given key starts with the specified prefix.
     */
    public function whereStringStartsWith(): Closure
    {
        return function (string $key, string $prefix) {
            /**
             * @var AssertableJson $this
             * @phpstan-ignore-next-line
             */
            $property = $this->prop($key);

            $assertion = Str::startsWith($property, $prefix);

            Assert::assertTrue(
                $assertion,
                sprintf("%s does not start with '%s'.", $key, $prefix)
            );

            return $this;
        };
    }

    /**
     * Asserts that the string at the given key ends with the specified suffix.
     */
    public function whereStringEndsWith(): Closure
    {
        return function (string $key, string $suffix) {
            /**
             * @var AssertableJson $this
             * @phpstan-ignore-next-line
             */
            $property = $this->prop($key);

            $assertion = Str::endsWith($property, $suffix);

            Assert::assertTrue(
                $assertion,
                sprintf("%s does not end with '%s'.", $key, $suffix)
            );

            return $this;
        };
    }

    /**
     * Asserts that the string at the given key has exactly the specified length.
     */
    public function whereExactLength(): Closure
    {
        return function (string $key, int $length) {
            /**
             * @var AssertableJson $this
             * @phpstan-ignore-next-line
             */
            $property = $this->prop($key);

            $assertion = Str::length($property) === $length;

            Assert::assertTrue(
                $assertion,
                sprintf("%s does not have the expected length of %d.", $key, $length)
            );

            return $this;
        };
    }

    /**
     * Asserts that the string at the given key matches the specified regular expression pattern.
     */
    public function whereMatchesPattern(): Closure
    {
        return function (string $key, string $pattern) {
            /**
             * @var AssertableJson $this
             * @phpstan-ignore-next-line
             */
            $property = $this->prop($key);

            Assert::assertMatchesRegularExpression(
                $pattern,
                $property,
                sprintf("%s does not match the regular expression.", $key)
            );

            return $this;
        };
    }

    /**
     * Asserts that the value at the given key is a string.
     */
    public function whereIsString(): Closure
    {
        return function (string $key) {
            /**
             * @var AssertableJson $this
             * @phpstan-ignore-next-line
             */
            $property = $this->prop($key);

            Assert::assertIsString(
                $property,
                sprintf("%s is not a string.", $key)
            );

            return $this;
        };
    }

    /**
     * Asserts that the value at the given key is an integer.
     */
    public function whereIsInteger(): Closure
    {
        return function (string $key) {
            /**
             * @var AssertableJson $this
             * @phpstan-ignore-next-line
             */
            $property = $this->prop($key);

            Assert::assertIsInt(
                $property,
                sprintf("%s is not an integer.", $key)
            );

            return $this;
        };
    }

    /**
     * Asserts that the value at the given key is a boolean.
     */
    public function whereIsBoolean(): Closure
    {
        return function (string $key) {
            /**
             * @var AssertableJson $this
             * @phpstan-ignore-next-line
             */
            $property = $this->prop($key);

            Assert::assertIsBool(
                $property,
                sprintf("%s is not a boolean.", $key)
            );

            return $this;
        };
    }

    /**
     * Asserts that the value at the given key is a float.
     */
    public function whereIsFloat(): Closure
    {
        return function (string $key) {
            /**
             * @var AssertableJson $this
             * @phpstan-ignore-next-line
             */
            $property = $this->prop($key);

            Assert::assertIsFloat(
                $property,
                sprintf("%s is not a float.", $key)
            );

            return $this;
        };
    }

    /**
     * Asserts that the value at the given key is empty (null, empty string, empty array, etc.).
     */
    public function whereIsEmpty(): Closure
    {
        return function (string $key) {
            /**
             * @var AssertableJson $this
             * @phpstan-ignore-next-line
             */
            $property = $this->prop($key);

            Assert::assertEmpty(
                $property,
                sprintf("%s is not empty.", $key)
            );

            return $this;
        };
    }

    /**
     * Asserts that the value at the given key is not empty.
     */
    public function whereIsNotEmpty(): Closure
    {
        return function (string $key) {
            /**
             * @var AssertableJson $this
             * @phpstan-ignore-next-line
             */
            $property = $this->prop($key);

            Assert::assertNotEmpty(
                $property,
                sprintf("%s is empty.", $key)
            );

            return $this;
        };
    }

    /**
     * Asserts that the string at the given key is exactly equal to the specified value.
     */
    public function whereStringEquals(): Closure
    {
        return function (string $key, string $value) {
            /**
             * @var AssertableJson $this
             * @phpstan-ignore-next-line
             */
            $property = $this->prop($key);

            Assert::assertSame(
                $value,
                $property,
                sprintf("%s is not equal to '%s'.", $key, $value)
            );

            return $this;
        };
    }

    /**
     * Asserts that the string at the given key is not equal to the specified value.
     */
    public function whereStringNotEquals(): Closure
    {
        return function (string $key, string $value) {
            /**
             * @var AssertableJson $this
             * @phpstan-ignore-next-line
             */
            $property = $this->prop($key);

            Assert::assertNotSame(
                $value,
                $property,
                sprintf("%s should not be equal to '%s'.", $key, $value)
            );

            return $this;
        };
    }

    /**
     * Asserts that the array at the given key is ordered by the specified key in the given direction.
     */
    public function whereResultsAreOrderedBy(): Closure
    {
        return function (string $key, string $orderKey, string $direction = 'asc') {
            /**
             * @var AssertableJson $this
             * @phpstan-ignore-next-line
             * @var array<mixed> $property
             */
            $property = $this->prop($key);


            $sorted = collect($property)->sortBy($orderKey, SORT_REGULAR, $direction === 'desc')->values()->all();

            Assert::assertSame(
                $sorted,
                $property,
                sprintf("%s is not ordered by '%s' in %s order.", $key, $orderKey, $direction)
            );

            return $this;
        };
    }

    /**
     * Asserts that the array at the given key contains the specified value.
     */
    public function whereResultsContain(): Closure
    {
        return function (string $key, $value) {
            /**
             * @var AssertableJson $this
             * @phpstan-ignore-next-line
             * @var array<mixed> $property
             */
            $property = $this->prop($key);

            $assertion = collect($property)->contains($value);

            Assert::assertTrue(
                $assertion,
                sprintf("%s does not contain the value '%s'.", $key, $value)
            );

            return $this;
        };
    }

    /**
     * Asserts that the array at the given key matches the specified criteria.
     * If partialMatch is true, it allows partial matching of the criteria values.
     */
    public function whereResultsMatchCriteria(): Closure
    {
        return function (string $key, array $criteria, bool $partialMatch = false) {
            /**
             * @var AssertableJson $this
             * @phpstan-ignore-next-line
             * @var array<mixed> $property
             */
            $property = $this->prop($key);

            $filtered = collect($property)->filter(function ($item) use ($criteria, $partialMatch) {
                foreach ($criteria as $criterionKey => $criterionValue) {
                    if (!isset($item[$criterionKey])) {
                        return false;
                    }

                    if ($partialMatch) {
                        if (strpos($item[$criterionKey], $criterionValue) === false) {
                            return false;
                        }
                    } else {
                        if ($item[$criterionKey] != $criterionValue) {
                            return false;
                        }
                    }
                }
                return true;
            })->values()->all();

            Assert::assertSame(
                $filtered,
                $property,
                sprintf("%s does not match the given criteria.", $key)
            );

            return $this;
        };
    }
}

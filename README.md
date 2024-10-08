# wheesnoza/assertable-json-enhancer

## Available Languages

- [English](./README.md)
- [日本語](./README.ja.md)
- [Español](./README.es.md)

`wheesnoza/assertable-json-enhancer` is a package that extends Laravel's `AssertableJson` class. This package enables more flexible and powerful assertions when testing JSON responses. It leverages the `Macroable` trait to provide several useful assertion methods.

## Installation

You can install this package via Composer:

```bash
composer require wheesnoza/assertable-json-enhancer
```

## Usage

After installation, this package automatically registers the necessary macros to the `AssertableJson` class. No additional setup is required.

### Compatibility

This package is fully compatible with Laravel Inertia's `AssertableInertia`. You can use the methods provided by `wheesnoza/assertable-json-enhancer` when writing assertions for Inertia responses.

## Available Methods

### Table of Contents
1. [whereStringContains](#1-wherestringcontainsstring-key-string-substring)
2. [whereLessThan](#2-wherelessthanstring-key-int-value)
3. [whereLessThanOrEqual](#3-wherelessthanorequalstring-key-int-value)
4. [whereGreaterThan](#4-wheregreaterthanstring-key-int-value)
5. [whereGreaterThanOrEqual](#5-wheregreaterthanorequalstring-key-int-value)
6. [whereIsArray](#6-whereisarraystring-key)
7. [whereArrayHasAtLeast](#7-wherearrayhasatleaststring-key-int-mincount)
8. [whereArrayHasSize](#8-wherearrayhassizestring-key-int-size)
9. [whereStringStartsWith](#9-wherestringstartswithstring-key-string-prefix)
10. [whereStringEndsWith](#10-wherestringendswithstring-key-string-suffix)
11. [whereExactLength](#11-whereexactlengthstring-key-int-length)
12. [whereMatchesPattern](#12-wherematchespatternstring-key-string-pattern)
13. [whereIsString](#13-whereisstringstring-key)
14. [whereIsInteger](#14-whereisintegerstring-key)
15. [whereIsBoolean](#15-whereisbooleanstring-key)
16. [whereIsFloat](#16-whereisfloatstring-key)
17. [whereIsEmpty](#17-whereisemptystring-key)
18. [whereIsNotEmpty](#18-whereisnotemptystring-key)
19. [whereStringEquals](#19-wherestringequalsstring-key-string-value)
20. [whereStringNotEquals](#20-wherestringnotequalsstring-key-string-value)
21. [whereResultsAreOrderedBy](#21-whereresultsareorderedbystring-key-string-orderkey-string-direction)
22. [whereResultsContain](#22-whereresultscontainstring-key-value)
23. [whereResultsMatchCriteria](#23-whereresultsmatchcriteriastring-key-array-criteria-bool-partialmatch)

### 1. `whereStringContains(string $key, string $substring)`

Asserts that the string at the given key contains the specified substring.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereStringContains('data.name', 'John')
);
```

### 2. `whereLessThan(string $key, int $value)`

Asserts that the value at the given key is less than the specified value.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereLessThan('data.age', 18)
);
```

### 3. `whereLessThanOrEqual(string $key, int $value)`

Asserts that the value at the given key is less than or equal to the specified value.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereLessThanOrEqual('data.age', 18)
);
```

### 4. `whereGreaterThan(string $key, int $value)`

Asserts that the value at the given key is greater than the specified value.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereGreaterThan('data.age', 18)
);
```

### 5. `whereGreaterThanOrEqual(string $key, int $value)`

Asserts that the value at the given key is greater than or equal to the specified value.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereGreaterThanOrEqual('data.age', 18)
);
```

### 6. `whereIsArray(string $key)`

Asserts that the value at the given key is an array.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereIsArray('data.items')
);
```

### 7. `whereArrayHasAtLeast(string $key, int $minCount)`

Asserts that the array at the given key has at least the specified number of elements.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereArrayHasAtLeast('data.items', 3)
);
```

### 8. `whereArrayHasSize(string $key, int $size)`

Asserts that the array at the given key has exactly the specified number of elements.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereArrayHasSize('data.items', 3)
);
```

### 9. `whereStringStartsWith(string $key, string $prefix)`

Asserts that the string at the given key starts with the specified prefix.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereStringStartsWith('data.title', 'Laravel')
);
```

### 10. `whereStringEndsWith(string $key, string $suffix)`

Asserts that the string at the given key ends with the specified suffix.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereStringEndsWith('data.title', 'Framework')
);
```

### 11. `whereExactLength(string $key, int $length)`

Asserts that the string at the given key has exactly the specified length.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereExactLength('data.code', 10)
);
```

### 12. `whereMatchesPattern(string $key, string $pattern)`

Asserts that the string at the given key matches the specified regular expression pattern.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereMatchesPattern('data.email', '/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/')
);
```

### 13. `whereIsString(string $key)`

Asserts that the value at the given key is a string.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereIsString('data.name')
);
```

### 14. `whereIsInteger(string $key)`

Asserts that the value at the given key is an integer.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereIsInteger('data.age')
);
```

### 15. `whereIsBoolean(string $key)`

Asserts that the value at the given key is a boolean.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereIsBoolean('data.active')
);
```

### 16. `whereIsFloat(string $key)`

Asserts that the value at the given key is a float.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereIsFloat('data.price')
);
```

### 17. `whereIsEmpty(string $key)`

Asserts that the value at the given key is empty (null, empty string, empty array, etc.).

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereIsEmpty('data.name')
);
```

### 18. `whereIsNotEmpty(string $key)`

Asserts that the value at the given key is not empty.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereIsNotEmpty('data.name')
);
```

### 19. `whereStringEquals(string $key, string $value)`

Asserts that the string at the given key is exactly equal to the specified value.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereStringEquals('data.status', 'active')
);
```

### 20. `whereStringNotEquals(string $key, string $value)`

Asserts that the string at the given key is not equal to the specified value.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereStringNotEquals('data.status', 'inactive')
);
```

### 21. `whereResultsAreOrderedBy(string $key, string $orderKey, string $direction = 'asc')`

Asserts that the array at the given key is ordered by the specified key in the given direction.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereResultsAreOrderedBy('data.items', 'id', 'asc')


);
```

### 22. `whereResultsContain(string $key, $value)`

Asserts that the array at the given key contains the specified value.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereResultsContain('data.items', 2)
);
```

### 23. `whereResultsMatchCriteria(string $key, array $criteria, bool $partialMatch = false)`

Asserts that the array at the given key matches the specified criteria. If `partialMatch` is true, it allows partial matching of the criteria values.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereResultsMatchCriteria('data.items', ['name' => 'Laravel'], true)
);
```

## Contributing

Contributions are welcome! Feel free to submit bug reports or pull requests. If you have any suggestions or improvements, please share them on GitHub.

## License

This package is open-sourced software licensed under the MIT license.

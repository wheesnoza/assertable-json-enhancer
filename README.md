# wheesnoza/assertable-json-enhancer

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

### 1. `whereValueContains(string $key, string $value)`

Asserts that the value associated with the specified key contains a particular substring.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereValueContains('data.name', 'John')
);
```

### 2. `whereGreaterThan(string $key, int $value)`

Asserts that the value associated with the specified key is greater than the given number.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereGreaterThan('data.age', 18)
);
```

### 3. `whereGreaterThanOrEqual(string $key, int $value)`

Asserts that the value associated with the specified key is greater than or equal to the given number.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereGreaterThanOrEqual('data.age', 18)
);
```

### 4. `whereIsArray(string $key)`

Asserts that the value associated with the specified key is an array.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereIsArray('data.items')
);
```

### 5. `whereArrayHasAtLeast(string $key, int $minCount)`

Asserts that the array associated with the specified key has at least the given number of elements.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereArrayHasAtLeast('data.items', 3)
);
```

### 6. `whereMatchesPattern(string $key, string $pattern)`

Asserts that the value associated with the specified key matches the given regular expression pattern.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereMatchesPattern('data.email', '/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/')
);
```

## Contributing

Contributions are welcome! Feel free to submit bug reports or pull requests. If you have any suggestions or improvements, please share them on GitHub.

## License

This package is open-sourced software licensed under the MIT license. Please see the `LICENSE` file for more details.

# wheesnoza/assertable-json-enhancer

`wheesnoza/assertable-json-enhancer` es un paquete que extiende la clase `AssertableJson` de Laravel. Este paquete permite realizar aserciones más flexibles y potentes al probar respuestas JSON. Utiliza el trait `Macroable` para proporcionar varios métodos de aserción útiles.

## Instalación

Puedes instalar este paquete a través de Composer:

```bash
composer require wheesnoza/assertable-json-enhancer
```

## Uso

Después de la instalación, este paquete registra automáticamente las macros necesarias en la clase `AssertableJson`. No se requiere configuración adicional.

### Compatibilidad

Este paquete es completamente compatible con `AssertableInertia` de Laravel Inertia. Puedes usar los métodos proporcionados por `wheesnoza/assertable-json-enhancer` al escribir aserciones para las respuestas de Inertia.

## Métodos Disponibles

### Tabla de Contenidos
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

Asserta que la cadena asociada con la clave especificada contiene la subcadena indicada.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereStringContains('data.name', 'John')
);
```

### 2. `whereLessThan(string $key, int $value)`

Asserta que el valor asociado con la clave especificada es menor que el valor indicado.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereLessThan('data.age', 18)
);
```

### 3. `whereLessThanOrEqual(string $key, int $value)`

Asserta que el valor asociado con la clave especificada es menor o igual al valor indicado.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereLessThanOrEqual('data.age', 18)
);
```

### 4. `whereGreaterThan(string $key, int $value)`

Asserta que el valor asociado con la clave especificada es mayor que el valor indicado.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereGreaterThan('data.age', 18)
);
```

### 5. `whereGreaterThanOrEqual(string $key, int $value)`

Asserta que el valor asociado con la clave especificada es mayor o igual al valor indicado.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereGreaterThanOrEqual('data.age', 18)
);
```

### 6. `whereIsArray(string $key)`

Asserta que el valor asociado con la clave especificada es un array.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereIsArray('data.items')
);
```

### 7. `whereArrayHasAtLeast(string $key, int $minCount)`

Asserta que el array asociado con la clave especificada tiene al menos el número de elementos indicado.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereArrayHasAtLeast('data.items', 3)
);
```

### 8. `whereArrayHasSize(string $key, int $size)`

Asserta que el array asociado con la clave especificada tiene exactamente el número de elementos indicado.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereArrayHasSize('data.items', 3)
);
```

### 9. `whereStringStartsWith(string $key, string $prefix)`

Asserta que la cadena asociada con la clave especificada comienza con el prefijo indicado.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereStringStartsWith('data.title', 'Laravel')
);
```

### 10. `whereStringEndsWith(string $key, string $suffix)`

Asserta que la cadena asociada con la clave especificada termina con el sufijo indicado.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereStringEndsWith('data.title', 'Framework')
);
```

### 11. `whereExactLength(string $key, int $length)`

Asserta que la cadena asociada con la clave especificada tiene exactamente la longitud indicada.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereExactLength('data.code', 10)
);
```

### 12. `whereMatchesPattern

(string $key, string $pattern)`

Asserta que la cadena asociada con la clave especificada coincide con el patrón de expresión regular indicado.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereMatchesPattern('data.email', '/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/')
);
```

### 13. `whereIsString(string $key)`

Asserta que el valor asociado con la clave especificada es una cadena.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereIsString('data.name')
);
```

### 14. `whereIsInteger(string $key)`

Asserta que el valor asociado con la clave especificada es un entero.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereIsInteger('data.age')
);
```

### 15. `whereIsBoolean(string $key)`

Asserta que el valor asociado con la clave especificada es un booleano.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereIsBoolean('data.active')
);
```

### 16. `whereIsFloat(string $key)`

Asserta que el valor asociado con la clave especificada es un flotante.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereIsFloat('data.price')
);
```

### 17. `whereIsEmpty(string $key)`

Asserta que el valor asociado con la clave especificada está vacío (nulo, cadena vacía, array vacío, etc.).

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereIsEmpty('data.name')
);
```

### 18. `whereIsNotEmpty(string $key)`

Asserta que el valor asociado con la clave especificada no está vacío.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereIsNotEmpty('data.name')
);
```

### 19. `whereStringEquals(string $key, string $value)`

Asserta que la cadena asociada con la clave especificada es exactamente igual al valor indicado.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereStringEquals('data.status', 'active')
);
```

### 20. `whereStringNotEquals(string $key, string $value)`

Asserta que la cadena asociada con la clave especificada no es igual al valor indicado.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereStringNotEquals('data.status', 'inactive')
);
```

### 21. `whereResultsAreOrderedBy(string $key, string $orderKey, string $direction = 'asc')`

Asserta que el array asociado con la clave especificada está ordenado por la clave especificada en la dirección indicada.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereResultsAreOrderedBy('data.items', 'id', 'asc')
);
```

### 22. `whereResultsContain(string $key, $value)`

Asserta que el array asociado con la clave especificada contiene el valor indicado.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereResultsContain('data.items', 2)
);
```

### 23. `whereResultsMatchCriteria(string $key, array $criteria, bool $partialMatch = false)`

Asserta que el array asociado con la clave especificada coincide con los criterios especificados. Si `partialMatch` es verdadero, permite la coincidencia parcial de los valores de los criterios.

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereResultsMatchCriteria('data.items', ['name' => 'Laravel'], true)
);
```

## Contribuciones

¡Las contribuciones son bienvenidas! No dudes en enviar informes de errores o solicitudes de extracción. Si tienes alguna sugerencia o mejora, compártela en GitHub.

## Licencia

Este paquete es software de código abierto licenciado bajo la licencia MIT.

# wheesnoza/assertable-json-enhancer

`wheesnoza/assertable-json-enhancer`は、Laravelの`AssertableJson`クラスを拡張するパッケージです。このパッケージは、JSONレスポンスをテストする際に、より柔軟で強力なアサーションを可能にします。`Macroable`トレイトを活用し、いくつかの便利なアサーションメソッドを提供します。

## インストール

このパッケージはComposerを使用してインストールできます。

```bash
composer require wheesnoza/assertable-json-enhancer
```

## 使い方

インストール後、このパッケージは`AssertableJson`クラスに必要なマクロを自動的に登録します。追加のセットアップは不要です。

### 互換性

このパッケージはLaravel Inertiaの`AssertableInertia`と完全に互換性があります。Inertiaレスポンスのアサーションを記述する際に、`wheesnoza/assertable-json-enhancer`が提供するメソッドを使用できます。

## 利用可能なメソッド

### 目次
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

指定されたキーに関連付けられた文字列が、指定された部分文字列を含んでいることをアサートします。

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereStringContains('data.name', 'John')
);
```

### 2. `whereLessThan(string $key, int $value)`

指定されたキーに関連付けられた値が、指定された値より小さいことをアサートします。

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereLessThan('data.age', 18)
);
```

### 3. `whereLessThanOrEqual(string $key, int $value)`

指定されたキーに関連付けられた値が、指定された値以下であることをアサートします。

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereLessThanOrEqual('data.age', 18)
);
```

### 4. `whereGreaterThan(string $key, int $value)`

指定されたキーに関連付けられた値が、指定された値より大きいことをアサートします。

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereGreaterThan('data.age', 18)
);
```

### 5. `whereGreaterThanOrEqual(string $key, int $value)`

指定されたキーに関連付けられた値が、指定された値以上であることをアサートします。

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereGreaterThanOrEqual('data.age', 18)
);
```

### 6. `whereIsArray(string $key)`

指定されたキーに関連付けられた値が配列であることをアサートします。

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereIsArray('data.items')
);
```

### 7. `whereArrayHasAtLeast(string $key, int $minCount)`

指定されたキーに関連付けられた配列が、指定された数以上の要素を持つことをアサートします。

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereArrayHasAtLeast('data.items', 3)
);
```

### 8. `whereArrayHasSize(string $key, int $size)`

指定されたキーに関連付けられた配列が、正確に指定された数の要素を持つことをアサートします。

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereArrayHasSize('data.items', 3)
);
```

### 9. `whereStringStartsWith(string $key, string $prefix)`

指定されたキーに関連付けられた文字列が、指定されたプレフィックスで始まることをアサートします。

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereStringStartsWith('data.title', 'Laravel')
);
```

### 10. `whereStringEndsWith(string $key, string $suffix)`

指定されたキーに関連付けられた文字列が、指定されたサフィックスで終わることをアサートします。

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereStringEndsWith('data.title', 'Framework')
);
```

### 11. `whereExactLength(string $key, int $length)`

指定されたキーに関連付けられた文字列が、正確に指定された長さであることをアサートします。

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereExactLength('data.code', 10)
);
```

### 12. `whereMatchesPattern(string $key, string $pattern)`

指定されたキーに関連付けられた文字列が、指定された正規表現パターンに一致することをアサートします。

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereMatchesPattern('data.email', '/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/')
);
```

### 13. `whereIsString(string $key)`

指定されたキーに関連付けられた値が文字列であることをアサートします。

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereIsString('data.name')
);
```

### 14. `whereIsInteger(string $key)`

指定されたキーに関連付けられた値が整数であることをアサートします。

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereIsInteger('data.age')
);
```

### 15. `whereIsBoolean(string $key)`

指定されたキーに関連付けられた値がブール値であることをアサートします。

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereIsBoolean('data.active')
);
```

### 16. `whereIsFloat(string $key)`

指定されたキーに関連付けられた値が浮動小数点数であることをアサートします。

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereIsFloat('data.price')
);
```

### 17. `whereIsEmpty(string $key)`

指定されたキーに関連付けられた値が空であることをアサートします（null、空文字列、空配列など）。

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereIs

Empty('data.name')
);
```

### 18. `whereIsNotEmpty(string $key)`

指定されたキーに関連付けられた値が空でないことをアサートします。

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereIsNotEmpty('data.name')
);
```

### 19. `whereStringEquals(string $key, string $value)`

指定されたキーに関連付けられた文字列が、指定された値と正確に一致することをアサートします。

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereStringEquals('data.status', 'active')
);
```

### 20. `whereStringNotEquals(string $key, string $value)`

指定されたキーに関連付けられた文字列が、指定された値と一致しないことをアサートします。

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereStringNotEquals('data.status', 'inactive')
);
```

### 21. `whereResultsAreOrderedBy(string $key, string $orderKey, string $direction = 'asc')`

指定されたキーに関連付けられた配列が、指定されたキーで指定された方向にソートされていることをアサートします。

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereResultsAreOrderedBy('data.items', 'id', 'asc')
);
```

### 22. `whereResultsContain(string $key, $value)`

指定されたキーに関連付けられた配列が、指定された値を含んでいることをアサートします。

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereResultsContain('data.items', 2)
);
```

### 23. `whereResultsMatchCriteria(string $key, array $criteria, bool $partialMatch = false)`

指定されたキーに関連付けられた配列が、指定された条件に一致することをアサートします。`partialMatch`がtrueの場合、条件値の部分一致を許可します。

```php
$response->assertJson(fn (AssertableJson $json) =>
    $json->whereResultsMatchCriteria('data.items', ['name' => 'Laravel'], true)
);
```

## 貢献

貢献は歓迎します！バグレポートやプルリクエストを自由に送信してください。提案や改善点があれば、GitHubで共有してください。

## ライセンス

このパッケージはMITライセンスの下でオープンソースソフトウェアとして提供されています。

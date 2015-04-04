## Installation

please check [composer website](http://getcomposer.org) for more information.

```
$ composer require 'devhelp/resource-core'
```

## Purpose

Provides abstraction over resource that can read content of itself

## Usage

### Usage of FileResource

```php
$resource = new FileResource($filePath);

$resource->getContent(); // returns content of file at $filePath

```

### Usage of ResourcesChain

```php
$chain = new ResourcesChain([
    new FileResource($filePath),
    new JsonResource()
]);

$chain->getContent(); // returns json decoded as array from file at $filePath

```

### Collecting Resources

ResourceCollector together with ResourceIterator implementations are designed to return collection of
Resource instances.

There are no implementations of ResourceIterator but they might exist for example for:
- files
- arrays
- web pages
- etc...


```php
$myIterator = new MyResourceIterator();

$collector = new ResourceCollector($myIterator);

$resources = $collector->collect(); //returns Resource[]
```

## Credits

Brought to you by : Devhelp.pl (http://devhelp.pl)

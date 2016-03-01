CRUDlex Addons
==============

This is a library with addons for
[CRUDlex](https://github.com/philiplb/CRUDlex) including file support for Amazon
S3.

Currently including:

- Amazon S3 FileProcessor: it is in the addon package as it pulls in some heavy
dependencies and is hard to unit test

## How To: Amazon S3 FileProcessor

First, create an instance of the Amazon S3 FileProcessor:

```php
$fileProcessor = new CRUDlex\AmazonS3FileProcessor(
    'yourBucket',
    'yourAccessKey',
    'yourSecretAccessKey'
);
```

And then hand it in when registering the CRUDlex ServiceProvider:

```php
$app->register(new CRUDlex\ServiceProvider(), array(
    'crud.file' => __DIR__ . '<yourCrud.yml>',
    'crud.datafactory' => $dataFactory,
    'crud.fileprocessor' => $fileProcessor
));
```

## Package

### Stable

```json
"require": {
    "philiplb/crudlexaddons": "0.9.9"
}
```

### Bleeding Edge

```json
"require": {
    "philiplb/crudlexaddons": "0.9.x-dev"
}
```

[![Total Downloads](https://poser.pugx.org/philiplb/crudlexaddons/downloads.svg)](https://packagist.org/packages/philiplb/crudlexaddons)
[![Latest Stable Version](https://poser.pugx.org/philiplb/crudlexaddons/v/stable.svg)](https://packagist.org/packages/philiplb/crudlexaddons)
[![Latest Unstable Version](https://poser.pugx.org/philiplb/crudlexaddons/v/unstable.svg)](https://packagist.org/packages/philiplb/crudlexaddons) [![License](https://poser.pugx.org/philiplb/crudlexaddons/license.svg)](https://packagist.org/packages/philiplb/crudlexaddons)

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
$fileProcessor = new CRUDlex\CRUDAmazonS3FileProcessor(
    'yourBucket',
    'yourAccessKey',
    'yourSecretAccessKey'
);
```

And then hand it in when registering the CRUDlexServiceProvider:

```php
$app->register(new CRUDlex\CRUDServiceProvider(), array(
    'crud.file' => __DIR__ . '<yourCrud.yml>',
    'crud.datafactory' => $dataFactory,
    'crud.fileprocessor' => $fileProcessor
));
```

## Package

### Stable

Soon.

### Bleeding Edge

```json
"require": {
    "philiplb/crudlexaddons": "dev-master"
}
```

[![Total Downloads](https://poser.pugx.org/philiplb/crudlexaddons/downloads.svg)](https://packagist.org/packages/philiplb/crudlexaddons)
[![Latest Stable Version](https://poser.pugx.org/philiplb/crudlexaddons/v/stable.svg)](https://packagist.org/packages/philiplb/crudlexaddons)
[![Latest Unstable Version](https://poser.pugx.org/philiplb/crudlexaddons/v/unstable.svg)](https://packagist.org/packages/philiplb/crudlexaddons) [![License](https://poser.pugx.org/philiplb/crudlexaddons/license.svg)](https://packagist.org/packages/philiplb/crudlexaddons)

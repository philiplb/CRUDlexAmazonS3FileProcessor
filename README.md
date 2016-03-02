CRUDlex Amazon S3 FileProcessor
===============================

This is a FileProcessor for [CRUDlex](https://github.com/philiplb/CRUDlex)
handling the uploaded files via Amazon S3.

Its tags follow the versioning of CRUDlex. So the version 0.9.9 will work with
CRUDlex 0.9.9 etc.. The master branch works against the master of CRUDlex.

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
    "philiplb/crudlexamazons3fileprocessor": "0.9.9"
}
```

### Bleeding Edge

```json
"require": {
    "philiplb/crudlexamazons3fileprocessor": "0.9.x-dev"
}
```

[![Total Downloads](https://poser.pugx.org/philiplb/crudlexaddons/downloads.svg)](https://packagist.org/packages/philiplb/crudlexaddons)
[![Latest Stable Version](https://poser.pugx.org/philiplb/crudlexaddons/v/stable.svg)](https://packagist.org/packages/philiplb/crudlexaddons)
[![Latest Unstable Version](https://poser.pugx.org/philiplb/crudlexaddons/v/unstable.svg)](https://packagist.org/packages/philiplb/crudlexaddons) [![License](https://poser.pugx.org/philiplb/crudlexaddons/license.svg)](https://packagist.org/packages/philiplb/crudlexaddons)

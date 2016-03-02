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

[![Total Downloads](https://poser.pugx.org/philiplb/crudlexamazons3fileprocessor/downloads.svg)](https://packagist.org/packages/philiplb/crudlexamazons3fileprocessor)
[![Latest Stable Version](https://poser.pugx.org/philiplb/crudlexamazons3fileprocessor/v/stable.svg)](https://packagist.org/packages/philiplb/crudlexamazons3fileprocessor)
[![Latest Unstable Version](https://poser.pugx.org/philiplb/crudlexamazons3fileprocessor/v/unstable.svg)](https://packagist.org/packages/philiplb/crudlexamazons3fileprocessor) [![License](https://poser.pugx.org/philiplb/crudlexamazons3fileprocessor/license.svg)](https://packagist.org/packages/philiplb/crudlexamazons3fileprocessor)

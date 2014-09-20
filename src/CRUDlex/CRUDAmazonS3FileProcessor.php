<?php

/*
 * This file is part of the CRUDlex package.
 *
 * (c) Philip Lehmann-Böhm <philip@philiplb.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CRUDlex;

use CRUDlex\CRUDFileProcessorInterface;
use CRUDlex\CRUDEntity;
use Symfony\Component\HttpFoundation\Request;
use Aws\S3\S3Client;

class CRUDAmazonS3FileProcessor implements CRUDFileProcessorInterface {

    protected $client;

    protected $region;

    protected $bucket;

    protected function getKey(CRUDEntity $entity, $entityName, $field) {
        return $entityName.'/'.$entity->get('id').'/'.$field;
    }

    public function __construct($region, $bucket, $accessKey, $secretAccessKey) {
        $this->client = S3Client::factory(array(
            'key' => $accessKey,
            'secret' => $secretAccessKey
        ));
        $this->region = $region;
        $this->bucket = $bucket;
    }

    public function createFile(Request $request, CRUDEntity $entity, $entityName, $field) {
        $file = $request->files->get($field);
        if ($file) {
            $key = $this->getKey($entity, $entityName, $field).'/'.$file->getClientOriginalName();
            $result = $this->client->putObject(array(
                'Bucket' => $this->bucket,
                'Key' => $key,
                'SourceFile' => $file->getPathname()
            ));
        }
    }

    public function updateFile(Request $request, CRUDEntity $entity, $entityName, $field) {
        // We could first delete the old file, but for now, we are defensive and don't delete ever.
        $this->createFile($request, $entity, $entityName, $field);
    }

    public function deleteFile(CRUDEntity $entity, $entityName, $field) {
    }

    public function renderFile(CRUDEntity $entity, $entityName, $field) {
    }
}

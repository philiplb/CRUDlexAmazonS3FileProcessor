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

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Aws\S3\S3Client;

class AmazonS3FileProcessor implements FileProcessorInterface {

    protected $client;

    protected $bucket;

    protected function getKey(Entity $entity, $entityName, $field) {
        return $entity->getDefinition()->getFilePath($field).'/'.$entityName.'/'.$entity->get('id').'/'.$field;
    }

    public function __construct($bucket, $accessKey, $secretAccessKey) {
        $this->client = S3Client::factory([
            'key' => $accessKey,
            'secret' => $secretAccessKey
        ]);
        $this->bucket = $bucket;
    }

    public function createFile(Request $request, Entity $entity, $entityName, $field) {
        $file = $request->files->get($field);
        if ($file) {
            $key = $this->getKey($entity, $entityName, $field).'/'.$file->getClientOriginalName();
            $result = $this->client->putObject([
                'Bucket' => $this->bucket,
                'Key' => $key,
                'SourceFile' => $file->getPathname()
            ]);
        }
    }

    public function updateFile(Request $request, Entity $entity, $entityName, $field) {
        // We could first delete the old file, but for now, we are defensive and don't delete ever.
        $this->createFile($request, $entity, $entityName, $field);
    }

    public function deleteFile(Entity $entity, $entityName, $field) {
        // For now, we are defensive and don't delete ever.
    }

    public function renderFile(Entity $entity, $entityName, $field) {

        $fileName = $entity->get($field);
        $mimeTypes = new MimeTypes();
        $mimeType = $mimeTypes->getMimeTypeByExtension($fileName);
        $key = $this->getKey($entity, $entityName, $field).'/'.$fileName;

        $result = $this->client->getObject([
            'Bucket' => $this->bucket,
            'Key'    => $key
        ]);
        $result['Body']->rewind();

        $response = new StreamedResponse(function () use ($result) {
            while ($data = $result['Body']->read(1024)) {
                echo $data;
                flush();
            }
        }, 200, [
            'Content-length' => $result['ContentLength'],
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'attachment; filename="'.$fileName.'"'
        ]);
        $response->send();

        return $response;
    }
}

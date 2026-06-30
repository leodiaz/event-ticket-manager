<?php

namespace App\Services;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;

class QrCodeService
{
    public function generate(string $data, string $path): void
    {
        $builder = new Builder(
            writer: new PngWriter(),
            writerOptions: [],
            validateResult: false,
            data: $data,
            size: 300,
            margin: 10
        );

        $result = $builder->build();

        $result->saveToFile($path);
    }
}
<?php

use MallardDuck\PrettierPhp\PrettierHtml;

beforeAll(function () {
    $adapter = new League\Flysystem\Local\LocalFilesystemAdapter(dirname(__DIR__));
    $filesystem = new League\Flysystem\Filesystem($adapter);
    if ($filesystem->directoryExists('node_modules')) {
        $filesystem->deleteDirectory('node_modules');
    }
});

it('can format basic HTML', function () {
    $formattedCode = PrettierHtml::format("<body>Text</body>");
})->throws(RuntimeException::class, "Must have Prettier installed via NPM either locally in project or globally.");

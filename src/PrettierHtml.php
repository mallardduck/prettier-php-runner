<?php

namespace MallardDuck\PrettierPhp;

use Composer\Autoload\ClassLoader;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\ExecutableFinder;
use Symfony\Component\Process\Process;

class PrettierHtml
{
    public static function format(
        string $code,
    ): string {
        return (new static())->callPrettier($code);
    }

    public function __construct(
    ) {
    }

    public function findNodeModulesBinPath(): string
    {
        static $classLoaderPath;
        if ($classLoaderPath === null) {
            $classLoaderPath = (new \ReflectionClass(ClassLoader::class))->getFileName();
        }

        return dirname($classLoaderPath, 3) . DIRECTORY_SEPARATOR . 'node_modules'. DIRECTORY_SEPARATOR . '.bin';
    }

    protected function callPrettier(string $html): string
    {
        $executable = (new ExecutableFinder())->find(
            name: 'prettier',
            extraDirs: [
            $this->findNodeModulesBinPath() ,
            '/usr/local/bin',
            '/opt/homebrew/bin',
        ]
        );

        if ($executable === null) {
            throw new \RuntimeException("Must have Prettier installed via NPM either locally in project or globally.");
        }

        $command = [
            $executable,
            '--stdin-filepath',
            'page.html',
        ];

        $process = Process::fromShellCommandline('echo "${:HTML}" | ' . implode(' ', $command));
        $process->run(null, ['HTML' => $html]);

        if (! $process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return $process->getOutput();
    }
}

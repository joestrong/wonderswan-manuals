<?php namespace App;

use League\Flysystem\Filesystem;
use League\Flysystem\StorageAttributes;

class TitleService
{
    public function __construct(
        protected Filesystem $filesystem,
    ) {
    }

    public function getTitles(): array
    {
        $titles = $this->filesystem
            ->listContents('/')
            ->filter(fn(StorageAttributes $attributes): bool => $attributes->isDir())
            ->map(fn(StorageAttributes $attributes): Title => new Title($attributes->path()))
            ->toArray();

        return $titles;
    }
}

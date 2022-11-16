<?php namespace App\Repositories;

use App\Title;
use League\Flysystem\Filesystem;
use League\Flysystem\StorageAttributes;

class FlysystemTitleImageRepository implements TitleImageRepositoryInterface
{
    public function __construct(
        protected Filesystem $filesystem,
    ) {
    }

    public function getAllTitles(): array
    {
        return $this->filesystem
            ->listContents('/')
            ->filter(fn(StorageAttributes $attributes): bool => $attributes->isDir())
            ->map(function(StorageAttributes $attributes): Title {
                return Title::make([
                    'code' => $attributes->path(),
                ]);
            })
            ->toArray();
    }
}

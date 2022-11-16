<?php namespace App\Repositories;

use App\Title;
use League\Flysystem\Filesystem;

class JsonTitleDataRepository implements TitleDataRepositoryInterface
{
    protected array $jsonData;

    public function __construct(
        protected Filesystem $filesystem,
    ) {
    }

    public function getTitles(array $titles): array
    {
        $this->loadJson();

        return array_map(function (Title $title): Title {
            $titleData = $this->jsonData['games'][$title->getCode()];

            return Title::make($titleData);
        }, $titles);
    }

    protected function loadJson(): void
    {
        if (isset($this->jsonData)) {
            return;
        }

        $json = $this->filesystem
            ->read('game-db.json');
        $this->jsonData = \json_decode($json, true);
    }
}

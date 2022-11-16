<?php namespace App;

use App\Repositories\TitleDataRepositoryInterface;
use App\Repositories\TitleImageRepositoryInterface;

class TitleService
{
    public function __construct(
        protected TitleImageRepositoryInterface $titleImageRepo,
        protected TitleDataRepositoryInterface $titleDataRepo,
    ) {
    }

    public function getTitles(): array
    {
        $titles = $this->titleImageRepo->getAllTitles();

        return $this->titleDataRepo->getTitles($titles);
    }
}

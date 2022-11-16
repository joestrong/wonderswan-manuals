<?php namespace App\Repositories;

interface TitleDataRepositoryInterface
{
    public function getTitles(array $titles): array;
}

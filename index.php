<?php

use App\TitleService;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);

$adapter = new League\Flysystem\Local\LocalFilesystemAdapter(
    __DIR__ . '/data'
);
$filesystem = new League\Flysystem\Filesystem($adapter);

$titleImageRepo = new \App\Repositories\FlysystemTitleImageRepository($filesystem);
$titleDataRepo = new \App\Repositories\JsonTitleDataRepository($filesystem);

$titleService = new TitleService($titleImageRepo, $titleDataRepo);
$titles = $titleService->getTitles();

$template = $twig->load('index.twig');
echo $template->render([
    'titles' => $titles,
]);

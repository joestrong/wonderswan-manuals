<?php namespace App;

class Title
{
    protected string $code;
    protected string $path;

    public function __construct()
    {
    }

    public static function make(array $data): Title
    {
        $title = new static;
        if (isset($data['code'])) {
            $title->setCode($data['code']);
        }
        if (isset($data['name'])) {
            $title->setName($data['name']);
        }

        return $title;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setName(string $path): void
    {
        $this->path = $path;
    }

    public function getName(): string
    {
        return $this->path;
    }
}

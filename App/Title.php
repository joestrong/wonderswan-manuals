<?php namespace App;

class Title
{
    public function __construct(
        protected string $path,
    )
    {
    }

    public function getName(): string
    {
        return $this->path;
    }
}

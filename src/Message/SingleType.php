<?php

namespace App\Message;

class SingleType
{
    public function __construct(private string $data) {}

    public function getData(): string
    {
        return $this->data;
    }
}
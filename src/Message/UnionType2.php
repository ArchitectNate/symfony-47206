<?php

namespace App\Message;

class UnionType2
{
    public function __construct(private string $data) {}

    public function getData(): string
    {
        return $this->data;
    }
}
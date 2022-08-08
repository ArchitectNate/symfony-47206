<?php

namespace App\Handler;

use App\Message\UnionType;
use App\Message\UnionType2;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

class UnionTypeHandler
{
    #[AsMessageHandler]
    public function unionType(UnionType|UnionType2 $message): void
    {
        echo $message->getData();
    }
}
<?php

namespace App\Handler;

use App\Message\SingleType;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

class SingleTypeHandler
{
    #[AsMessageHandler]
    public function unionType(SingleType $message): void
    {
        echo $message->getData() . PHP_EOL;
    }
}
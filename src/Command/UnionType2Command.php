<?php

namespace App\Command;

use App\Message\UnionType2;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand(name: 'app:union-type-2')]
class UnionType2Command extends Command
{
    public function __construct(private readonly MessageBusInterface $messageBus)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $message = new UnionType2("Union Type 2 Handler");
        $this->messageBus->dispatch($message);

        return Command::SUCCESS;
    }
}
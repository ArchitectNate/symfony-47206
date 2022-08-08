<?php

namespace App\Command;

use App\Message\UnionType;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand(name: 'app:union-type', hidden: false)]
class UnionTypeCommand extends Command
{
    protected static $defaultName = 'app:union-type';
    protected static $defaultDescription = 'Tests if handlers can have methods with Union Types';

    public function __construct(private readonly MessageBusInterface $messageBus)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $message = new UnionType("test");
        $this->messageBus->dispatch($message);

        return Command::SUCCESS;
    }
}
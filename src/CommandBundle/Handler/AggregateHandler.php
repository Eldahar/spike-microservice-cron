<?php

namespace Microservice\CommandBundle\Handler;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\Exception\BadMethodCallException;

use Microservice\CoreBundle\Interfaces\CommandHandlerInterface;

class AggregateHandler implements CommandHandlerInterface {
    /**
     * {@inheritDoc}
     */
    public function handle(InputInterface $input, OutputInterface $output): void {
        printf("Aggregálok!\n");
        throw new BadMethodCallException('Message szövege');
    }
}
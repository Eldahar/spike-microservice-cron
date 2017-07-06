<?php

namespace Microservice\CoreBundle\Interfaces;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

interface CommandHandlerInterface {
    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    public function handle(InputInterface $input, OutputInterface $output) : void;
}
<?php


namespace Microservice\CoreBundle\Interfaces;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

interface CommandErrorHandlerInterface {
    /**
     * @param \Exception $e
     */
    public function onError(\Exception $e) : void;

    /**
     * @param InputInterface $input
     */
    public function setInput(InputInterface $input) : void;

    /**
     * @param OutputInterface $output
     */
    public function setOutput(OutputInterface $output) : void;
}
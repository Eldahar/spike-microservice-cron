<?php

namespace Microservice\CoreBundle\Handler;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Microservice\CoreBundle\Interfaces\CommandErrorHandlerInterface;

class ErrorHandler implements CommandErrorHandlerInterface {
    /**
     * @var InputInterface
     */
    protected $input;

    /**
     * @var OutputInterface
     */
    protected $output;

    /**
     * @param InputInterface $input
     */
    public function setInput(InputInterface $input): void {
        $this->input = $input;
    }

    /**
     * @param OutputInterface $output
     */
    public function setOutput(OutputInterface $output): void {
        $this->output = $output;
    }

    /**
     * @param \Exception $e
     */
    public function onError(\Exception $e): void {
        printf("Hibát kaptam(%s) : %s", get_class($e), $e->getMessage());
    }
}
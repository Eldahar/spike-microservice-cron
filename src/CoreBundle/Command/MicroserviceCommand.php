<?php

namespace Microservice\CoreBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Microservice\CoreBundle\Interfaces\CommandErrorHandlerInterface;
use Microservice\CoreBundle\Interfaces\CommandHandlerInterface;

class MicroserviceCommand extends Command {
    const COMMAND_NAME = 'ms:run';

    /**
     * @var CommandHandlerInterface
     */
    protected $handler;

    /**
     * @var CommandErrorHandlerInterface
     */
    protected $errorHandler;

    public function __construct(CommandHandlerInterface $handler, CommandErrorHandlerInterface $errorHandler) {
        parent::__construct();
        $this->errorHandler = $errorHandler;
        $this->handler = $handler;
    }

    protected function configure() {
        $this->setName(self::COMMAND_NAME);
        $this->setDescription('The main worker process');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        try {
            $this->handler->handle($input, $output);
        } catch(\Exception $e) {
            $this->errorHandler->setInput($input);
            $this->errorHandler->setOutput($output);
            $this->errorHandler->onError($e);
        }
    }
}
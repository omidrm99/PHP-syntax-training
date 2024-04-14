<?php

namespace App\app;

use http\Exception\InvalidArgumentException;
use App\Enums\Command;

class CommandValidation
{

    private string $command;

    public function __construct()
    {
        $this->setCommand(Command::ALL);
    }


    public function setCommand(string $command): self
    {
        if (!isset(Command::ALL_COMMANDS[$command])) {
            throw new InvalidArgumentException('Invalid Command');

        }


        $this->command = $command;

        return $this;
    }
}
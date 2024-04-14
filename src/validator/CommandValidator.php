<?php

namespace App\app;

use http\Exception\InvalidArgumentException;
use App\Enums\Command;

class CommandValidation
{

    private string $command;

    public function __construct()
    {
        $this->checkCommand(Command::ALL);
    }


    public function checkCommand(string $command): self
    {
        if (!isset(Command::ALL_COMMANDS[$command])) {
            throw new InvalidArgumentException('Invalid Command');
        }


        $this->command = $command;

        return $this;
    }
}
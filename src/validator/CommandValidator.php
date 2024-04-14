<?php

namespace App\validator;

use http\Exception\InvalidArgumentException;
use App\Enums\Command;

class CommandValidation
{

    private string $command;

    public function __construct()
    {
        $this->checkCommand(Command::ALL);
    }

    public function checkCommand(string $command): bool
    {
        if (!isset(Command::ALL_COMMANDS[$command])) {
            return false;
        }

        return true;
    }

}
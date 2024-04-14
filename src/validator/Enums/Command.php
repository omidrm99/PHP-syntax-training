<?php
namespace App\validator\Enums;
class Command
{
    public const ALL = 'ALL';
    public const FIND = 'FIND';
    public const ADD = 'ADD';

    public const ALL_COMMANDS = [
        self::ALL => 'All',
        self::FIND => 'Find',
        self::ADD => 'Add'
    ];
}
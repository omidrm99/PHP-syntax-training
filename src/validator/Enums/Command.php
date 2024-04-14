<?php
namespace App\Enums;
class Command
{
    public const ALL = 'all';
    public const FIND = 'find';
    public const ADD = 'add';

    public const ALL_COMMANDS = [
        self::ALL => 'hamise',
        self::FIND => 'tap',
        self::ADD => 'izafalat'
    ];
}
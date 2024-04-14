<?php

namespace App\request\commandManager;

use App\request\CommandReader;
use App\dataBaseReader\Merger;

class addCommand
{
    private array $result;
    private array $data;
    private array $newBook;

    public function getResult(): array
    {
        $commandReader = new CommandReader();
        $this->data = $commandReader->getCommand();
        $this->newBookReader();
        $this->addCommand();
        return $this->result;
    }


    private function newBookReader()
    {
        $this->newBook = array(
            array(
                "ISBN" => $this->data['newBook'][0],
                "bookTitle" => $this->data['newBook'][1],
                "authorName" => $this->data['newBook'][2],
                "pagesCount" => $this->data['newBook'][3],
                "publishDate" => $this->data['newBook'][4]
            )
        );
    }

    private function addCommand()
    {
        $allBooks = new Merger();
        $this->result = array_merge($allBooks->getSortedBooks(),$this->newBook);
    }
}
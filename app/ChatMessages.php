<?php
namespace App;

use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\Writer;

class ChatMessages
{
    private Reader $reader;
    private Writer $writer;

    public function __construct()
    {
        $this->reader = Reader::createFromPath('chatMessages.csv', 'r');
        $this->reader->setHeaderOffset(0);
        $this->writer = Writer::createFromPath('chatMessages.csv', 'a');
    }

    public function getMessages(): \League\Csv\TabularDataReader
    {
        $statement = Statement::create();
        return $statement->process($this->reader);
    }

    public function addMessage(string $name, string $message)
    {
        $this->writer->insertOne([$name, $message]);
    }
}
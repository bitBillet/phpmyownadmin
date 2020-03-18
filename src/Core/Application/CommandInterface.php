<?php


namespace src\Core\Application;


interface CommandInterface
{
    public function execute(string $record);
}
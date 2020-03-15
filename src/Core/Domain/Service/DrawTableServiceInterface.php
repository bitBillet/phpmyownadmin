<?php
namespace src\Core\Domain\Service;

interface DrawTableServiceInterface
{
    public static function drawTable(array $model) : string;
}
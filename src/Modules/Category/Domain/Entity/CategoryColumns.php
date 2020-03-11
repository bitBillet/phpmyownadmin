<?php
use Core\Domain\Entity\EntityInterface;

class CategoryColumns implements EntityInterface
{
    const TABLE_NAME = 'columns';

    public function getTableName(): string
    {
        return self::TABLE_NAME;
    }
}
<?php
use Core\Domain\Entity\EntityInterface;

class CategoryEditTables implements EntityInterface
{
    const TABLE_NAME = 'edit_tables';

    public function getTableName(): string
    {
        return self::TABLE_NAME;
    }
}
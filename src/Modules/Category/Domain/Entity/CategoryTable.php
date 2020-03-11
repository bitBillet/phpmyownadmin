<?php
use Core\Domain\Entity\EntityInterface;

class CategoryTable implements EntityInterface
{
    private $tableName;
    public function __construct(string $tableName, array $columns = null)
    {
        $this->tableName = $tableName;
        // тут будет процесс создания таблицы, наверное
    }

    public function getTableName(): string
    {
        return $this->tableName;
    }
}
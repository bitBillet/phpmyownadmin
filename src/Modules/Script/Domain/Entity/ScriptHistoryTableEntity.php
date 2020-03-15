<?php


namespace src\Modules\Script\Domain\Entity;

use Core\Domain\Entity\EntityInterface;

class ScriptHistoryTableEntity implements EntityInterface
{
    const TABLE_NAME = 'script_history';

    public function getTableName(): string
    {
        return self::TABLE_NAME;
    }
}
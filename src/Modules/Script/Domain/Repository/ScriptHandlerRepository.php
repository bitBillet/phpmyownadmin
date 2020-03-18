<?php

namespace src\Modules\Script\Domain\Repository;
use Yii;

class ScriptHandlerRepository
{
    public function sqlRequest(string $record)
    {
        return Yii::$app->db->createCommand($record)
            ->execute();
    }

    public function sqlRequestIfSelect(string $record)
    {
        return Yii::$app->db->createCommand($record)
            ->queryAll();
    }
}
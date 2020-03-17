<?php

namespace src\Modules\Script\Domain\Repository;
use Yii;

class SqlHandlerRepository
{
    public function sqlRequest(string $fullSql)
    {
        return Yii::$app->db->createCommand($fullSql)
            ->execute();
    }

    public function sqlRequestIfSelect(string $fullSql)
    {
        return ['select', Yii::$app->db->createCommand($fullSql)
            ->queryAll()];
    }
}
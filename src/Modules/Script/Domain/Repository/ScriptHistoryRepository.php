<?php


namespace src\Modules\Script\Domain\Repository;


use Yii;
use yii\db\Query;

class ScriptHistoryRepository
{
    private $tableName;

    public function __construct(string $tableName = 'script_history')
    {
        $this->tableName = $tableName;
    }

    public function addRecordToTable($record)
    {
        Yii::$app->db->createCommand()->insert($this->tableName, [
            'text' => $record,
            'date' => date('Y-m-d')
            ])->execute();
    }
    public function getTableData(): array
    {
        return (new Query())
            ->select(["text", "date"])
            ->from($this->tableName)
            ->all();
    }
}
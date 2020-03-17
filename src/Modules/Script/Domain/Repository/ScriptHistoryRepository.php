<?php


namespace src\Modules\Script\Domain\Repository;


use Yii;
use yii\db\Query;

class ScriptHistoryRepository
{
    private $record;
    private $tableName;

    public function __construct(string $tableName, $record = null)
    {
        $this->record = $record;
        $this->tableName = $tableName;
    }

    public function addRecordToTable()
    {
        Yii::$app->db->createCommand()->insert($this->tableName, [
            'text' => $this->record,
            ])->execute();
    }
    public function getTableData(): array
    {
        return (new Query())
            ->select(["text"])
            ->from($this->tableName)
            ->all();
    }
}
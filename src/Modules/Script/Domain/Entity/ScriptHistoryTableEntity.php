<?php


namespace src\Modules\Script\Domain\Entity;


use src\Modules\Script\Domain\Repository\ScriptHistoryRepository;
use src\Modules\Script\Domain\Service\DrawTableService;

class ScriptHistoryTableEntity
{
    const TABLE_NAME = 'script_history';
    private $historyRepo;

    public function addRecord(string $text)
    {
        $this->historyRepo = new ScriptHistoryRepository(self::TABLE_NAME, $text);
        $this->historyRepo->addRecordToTable();
    }
    public function getData()
    {
        $this->historyRepo = new ScriptHistoryRepository(self::TABLE_NAME);
        $model = $this->historyRepo->getTableData();
        return DrawTableService::drawTable($model);
    }
}
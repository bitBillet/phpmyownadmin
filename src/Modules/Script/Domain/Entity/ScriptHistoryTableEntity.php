<?php


namespace src\Modules\Script\Domain\Entity;

use src\Core\Domain\Entity\EntityInterface;
use src\Core\Domain\Repository\RecordRepositoryInterface;
use src\Modules\Script\Domain\Repository\ScriptHistoryRepository;
use src\Modules\Script\Domain\Service\DrawTableService;

class ScriptHistoryTableEntity implements EntityInterface
{
    const TABLE_NAME = 'script_history';
    private $record;
    private $historyRepo;

    public function __construct($record = null)
    {
        $this->record = $record;
        $this->historyRepo = new ScriptHistoryRepository(self::TABLE_NAME, $this->record);
    }

    public function getTableName(): string
    {
        return self::TABLE_NAME;
    }
    public function addRecord()
    {
        $this->historyRepo->addRecordToTable();
    }
    public function getData()
    {
        $model = $this->historyRepo->getTableData();
        return DrawTableService::drawTable($model);
    }
}
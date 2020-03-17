<?php
namespace src\Modules\Script\Application\Command;

use src\Modules\Script\Domain\Entity\ScriptHistoryTableEntity;
use src\Modules\Script\Domain\Repository\ScriptHistoryRepository;
use src\Modules\Script\Domain\Service\DrawTableService;
use src\Modules\Script\Domain\Service\SqlHandlerService;

class SqlHandlerCommand
{
    public function execute(
        SqlHandlerService $service,
        ScriptHistoryTableEntity $historyEntity,
        ScriptHistoryRepository $historyRepo,
        string $text
    ) {
        $sendResult = $service->send($text);
        $historyEntity->addRecord($historyRepo, $text);
        if ($sendResult[0] === 'select') {
            return DrawTableService::drawSelectTable($sendResult);
        }
        else {
            return $sendResult;
        }
    }
}
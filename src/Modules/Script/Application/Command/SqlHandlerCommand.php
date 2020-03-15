<?php
namespace src\Modules\Script\Application\Command;

use src\Modules\Script\Domain\Service\DrawTableService;
use src\Modules\Script\Domain\Service\SqlHandlerServiceInterface;

class SqlHandlerCommand
{
    private $sendService;
    public function __construct(SqlHandlerServiceInterface $sendService)
    {
        $this->sendService = $sendService;
    }
    public function execute()
    {
        $sendResult = $this->sendService->send();
        if ($sendResult[0] === 'select') {
            return DrawTableService::drawTable($sendResult);
        }
        else {
            return $sendResult;
        }
    }
}
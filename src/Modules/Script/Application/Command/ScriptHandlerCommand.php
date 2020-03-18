<?php
namespace src\Modules\Script\Application\Command;

use src\Core\Application\CommandInterface;
use src\Modules\Script\Domain\Repository\ScriptHistoryRepository;
use src\Modules\Script\Domain\Service\ScriptResponseService;
use src\Modules\Script\Domain\Service\ScriptHandlerService;

class ScriptHandlerCommand implements CommandInterface
{
    private $scriptHistoryRepository;
    private $scriptHandlerService;
    private $scriptResponseService;

    public function __construct(
        ScriptHandlerService $scriptHandlerService,
        ScriptHistoryRepository $scriptHistoryRepository,
        ScriptResponseService $scriptResponseService
    ) {
        $this->scriptHistoryRepository = $scriptHistoryRepository;
        $this->scriptHandlerService = $scriptHandlerService;
        $this->scriptResponseService = $scriptResponseService;
    }

    public function execute(string $record)
    {
        $recordData = $this->scriptHandlerService->send($record);
        $this->scriptHistoryRepository->addRecordToTable($record);
        return $this->scriptResponseService->getResponse($recordData);
    }
}
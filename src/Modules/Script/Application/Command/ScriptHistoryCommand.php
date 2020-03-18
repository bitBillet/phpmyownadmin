<?php


namespace src\Modules\Script\Application\Command;

use src\Core\Application\CommandInterface;
use src\Modules\Script\Domain\Repository\ScriptHistoryRepository;
use src\Modules\Script\Domain\Service\ScriptResponseService;

class ScriptHistoryCommand implements CommandInterface
{
    private $scriptHistoryRepository;
    private $scriptResponseService;

    public function __construct(
        ScriptHistoryRepository $scriptHistoryRepository,
        ScriptResponseService $scriptResponseService
    ) {
        $this->scriptHistoryRepository = $scriptHistoryRepository;
        $this->scriptResponseService = $scriptResponseService;
    }

    public function execute(string $record = null)
    {
        $scriptHistoryData = $this->scriptHistoryRepository->getTableData();
        return $this->scriptResponseService->getResponse($scriptHistoryData);
    }
}
<?php
namespace src\Modules\Script\Application\Command;

use src\Modules\Script\Domain\Service\SqlHandlerServiceInterface;

class SqlHandlerCommand
{
    private $service;
    public function __construct(SqlHandlerServiceInterface $service)
    {
        $this->service = $service;
    }
    public function execute()
    {
        return $this->service->send();
    }
}
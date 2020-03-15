<?php
namespace src\Modules\Script\Domain\Service;

use src\Modules\Script\Domain\Repository\SqlHandlerRepository;

class SqlHandlerService implements SqlHandlerServiceInterface
{
//    private $isTableCreate;
//    private $isColumnCreate;
    private $fullRequest;
    private $sqlCommand;
    private $isSelect = false;
    public function __construct (string $fullRequest)
    {
//        $this->isTableCreate = preg_match('/create table/i', $fullRequest);
//        $this->isColumnCreate = preg_match('/create column/i', $fullRequest);
        for ($i = 0; $i < strlen($fullRequest); $i++) {
            if ($fullRequest{$i} == ' ') {
                $this->sqlCommand = substr($fullRequest, 0, $i);
                break;
            }
        }
        $this->fullRequest = $fullRequest;
    }
    public function send()
    {
        $repo = new SqlHandlerRepository();
        if (strtolower($this->sqlCommand) === 'select') {
            $this->isSelect = true;
            return $repo->sqlRequestIfSelect($this->fullRequest);
        }
        else {
            return $repo->sqlRequest($this->fullRequest);
        }
    }
}
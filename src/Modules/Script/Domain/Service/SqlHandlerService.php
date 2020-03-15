<?php
namespace src\Modules\Script\Domain\Service;

use src\Modules\Script\Domain\Repository\SqlHandlerRepository;
use yii\web\NotFoundHttpException;

class SqlHandlerService implements SqlHandlerServiceInterface
{
    private $isTableCreate;
    private $isColumnCreate;
    private $fullRequest;
    private $sqlCommand;
    public function __construct (string $fullRequest)
    {
        $isDatabaseCommand = preg_match('/database|databases/i', $fullRequest);
        if ($isDatabaseCommand) {
            throw new NotFoundHttpException('у меня тут только одна бд');
        }
        $this->isTableCreate = preg_match('/create table/i', $fullRequest);
        $this->isColumnCreate = preg_match('/create column/i', $fullRequest);
        $arr = explode(' ',trim($fullRequest));
        $this->sqlCommand = $arr[0];
        $this->fullRequest = $fullRequest;
    }
    public function send()
    {
        $repo = new SqlHandlerRepository();
        $lowerSqlCommand = strtolower($this->sqlCommand);
        if ($lowerSqlCommand === 'select' ||  $lowerSqlCommand === 'show') {
            return $repo->sqlRequestIfSelect($this->fullRequest);
        }
        else {
            return $repo->sqlRequest($this->fullRequest);
        }
    }
}
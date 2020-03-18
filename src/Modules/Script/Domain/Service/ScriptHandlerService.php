<?php
namespace src\Modules\Script\Domain\Service;

use src\Modules\Script\Domain\Repository\ScriptHandlerRepository;
use yii\web\NotFoundHttpException;

class ScriptHandlerService
{
    private $isTableCreate;
    private $isColumnCreate;
    private $record;
    private $sqlCommand;
    private $scriptHandlerRepository;

    public function __construct(ScriptHandlerRepository $scriptHandlerRepository)
    {
        $this->scriptHandlerRepository = $scriptHandlerRepository;
    }

    public function textScanner (string $record)
    {
        $isDatabaseCommand = preg_match('/database|databases/i', $record);
        if ($isDatabaseCommand) {
            throw new NotFoundHttpException('у меня тут только одна бд');
        }
        $this->isTableCreate = preg_match('/create table/i', $record);
        $this->isColumnCreate = preg_match('/create column/i', $record);
        $arrCommand = explode(' ',trim($record));
        $this->sqlCommand = $arrCommand[0];
        $this->record = $record;
    }
    public function send(string $record)
    {
        $this->textScanner($record);
        $lowerSqlCommand = strtolower($this->sqlCommand);
        $recordData = null;
        if ($lowerSqlCommand === 'select' ||  $lowerSqlCommand === 'show') {
            $recordData = $this->scriptHandlerRepository->sqlRequestIfSelect($this->record);
        }
        else {
            $recordData = $this->scriptHandlerRepository->sqlRequest($this->record);
        }
        return $recordData;
    }
}
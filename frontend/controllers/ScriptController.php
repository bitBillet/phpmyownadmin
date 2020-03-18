<?php


namespace frontend\controllers;

use src\Modules\Script\Application\Command\ScriptHistoryCommand;
use src\Modules\Script\Domain\Repository\ScriptHandlerRepository;
use src\Modules\Script\Domain\Service\ScriptHandlerService;
use src\Modules\Script\Domain\Service\ScriptResponseService;
use Yii;
use yii\web\Controller;
use src\Modules\Script\Application\Command\ScriptHandlerCommand;
use src\Modules\Script\Domain\Repository\ScriptHistoryRepository;

class ScriptController extends Controller
{
    private $scriptHandlerCommand;
    private $scriptHistoryCommand;

    public function __construct(
        $id,
        $module,
        ScriptHandlerCommand $scriptHandlerCommand,
        ScriptHistoryCommand $scriptHistoryCommand,
        $config = []
    ) {
        $this->scriptHandlerCommand = $scriptHandlerCommand;
        $this->scriptHistoryCommand = $scriptHistoryCommand;
        parent::__construct($id, $module, $config);
    }

    public function actionSqlScript()
    {
        $htmlResponse = null;
        if (Yii::$app->request->post()) {
            $record = Yii::$app->request->getBodyParams()['text'];
            $htmlResponse = $this->scriptHandlerCommand->execute($record);
        }
        return $this->render('sqlScript', ['data' => $htmlResponse]);
    }

    public function actionScriptHistory()
    {
        $scriptHistoryHtml = $this->scriptHistoryCommand->execute();
        return $this->render('scriptHistory', ['data' => $scriptHistoryHtml]);
    }
}
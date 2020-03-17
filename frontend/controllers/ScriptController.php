<?php


namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use src\Modules\Script\Application\Command\SqlHandlerCommand;
use src\Modules\Script\Domain\Service\SqlHandlerService;
use src\Modules\Script\Domain\Entity\ScriptHistoryTableEntity;
use src\Modules\Script\Domain\Repository\ScriptHistoryRepository;

class ScriptController extends Controller
{
    private $command;
    private $service;
    private $historyEntity;
    private $historyRepo;

    public function __construct(
        $id,
        $module,
        ScriptHistoryRepository $historyRepo,
        SqlHandlerCommand $command,
        SqlHandlerService $service,
        ScriptHistoryTableEntity $historyEntity,
        $config = []
    ) {
        $this->historyRepo = $historyRepo;
        $this->command = $command;
        $this->historyEntity = $historyEntity;
        $this->service = $service;
        parent::__construct($id, $module, $config);
    }

    public function actionSqlScript()
    {
        $data = null;
        if (Yii::$app->request->post()) {
            $text = Yii::$app->request->getBodyParams()['text'];
            $data = $this->command->execute($this->service, $this->historyEntity, $this->historyRepo, $text);
        }
        return $this->render('sqlScript', ['data' => $data]);
    }

    public function actionScriptHistory()
    {
        $data = $this->historyEntity->getData();
        return $this->render('scriptHistory', ['model' => $data]);
    }
}
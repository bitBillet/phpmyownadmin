<?php


namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use src\Modules\Script\Application\Command\SqlHandlerCommand;
use src\Modules\Script\Domain\Service\SqlHandlerService;

class ScriptController extends Controller
{
    public function actionSqlScript()
    {
        $model = null;
        if (Yii::$app->request->post()) {
            $text = Yii::$app->request->getBodyParams()['text'];
            $service = new SqlHandlerService($text);
            $request = new SqlHandlerCommand($service);
            $model = $request->execute();
        }
        return $this->render('sqlScript', ['model' => $model]);
    }
}
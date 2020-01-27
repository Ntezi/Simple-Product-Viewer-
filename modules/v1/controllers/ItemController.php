<?php


namespace app\modules\v1\controllers;


use yii\helpers\ArrayHelper;
use yii\rest\Controller;

class ItemController extends Controller
{
    public $modelClass = 'app\modules\v1\models\Item';

    public function actions()
    {
        $actions = parent::actions();

        ArrayHelper::remove($actions, 'index');
        ArrayHelper::remove($actions, 'view');
        ArrayHelper::remove($actions, 'create');
        ArrayHelper::remove($actions, 'update');
        ArrayHelper::remove($actions, 'delete');
        ArrayHelper::remove($actions, 'options');

        return ArrayHelper::merge($actions, [
            'index' => [
                'class' => 'app\modules\v1\actions\item\IndexAction',
                'modelClass' => $this->modelClass,
            ],
            'create' => [
                'class' => 'app\modules\v1\actions\item\CreateAction',
                'modelClass' => $this->modelClass,
            ],
            'detail' => [
                'class' => 'app\modules\v1\actions\item\DetailAction',
                'modelClass' => $this->modelClass,
            ],
        ]);
    }

    protected function verbs()
    {
        return [
            'index' => ['GET'],
            'create' => ['POST'],
            'detail' => ['GET'],
        ];
    }
}
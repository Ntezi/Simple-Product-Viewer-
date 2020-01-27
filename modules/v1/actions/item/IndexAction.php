<?php


namespace app\modules\v1\actions\item;

use Yii;
use app\modules\v1\models\Item;
use yii\rest\Action;
use yii\web\Response;

class IndexAction extends Action
{
    public function run()
    {
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $items = Item::find()->all();
        if (!empty($items)) {
            $response->statusCode = 200;
            $response->data = [
                'message' => 'Success!',
                'data' => $items,
                'code' => $response->statusCode
            ];
        } else {
            $response->statusCode = 404;
            $response->data = ['message' => 'items not fund!', 'code' => $response->statusCode];
            return $response;
        }
    }
}
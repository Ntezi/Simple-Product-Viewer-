<?php


namespace app\modules\v1\actions\item;

use Yii;
use app\modules\v1\models\Item;
use yii\rest\Action;
use yii\web\Response;

class DetailAction extends Action
{
    public function run()
    {
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $params = Yii::$app->request->get();
        $item_id = $params['item_id'];

        $item = Item::findOne(['id' => $item_id]);
        if (!empty($item)) {
            $response->statusCode = 200;
            $response->data = [
                'message' => 'Success!',
                'data' => $item,
                'code' => $response->statusCode
            ];
        } else {
            $response->statusCode = 404;
            $response->data = ['message' => 'item not fund!', 'code' => $response->statusCode];
            return $response;
        }
    }
}

{

}
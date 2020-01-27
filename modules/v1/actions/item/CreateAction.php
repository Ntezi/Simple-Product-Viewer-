<?php


namespace app\modules\v1\actions\item;


use Yii;
use app\modules\v1\models\Item;
use yii\rest\Action;
use yii\web\Response;

class CreateAction extends Action
{
    public function run()
    {
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $params = Yii::$app->request->post();
        $name = $params['name'];
        $price = $params['price'];
        $date = $params['date'];

        if ($name != null && $price != null && $date != null) {

            $model = new $this->modelClass();
            $model->name = $name;
            $model->price = $price;
            $model->manufacturing_date = $date;

            if ($model->save()) {
                $response->statusCode = 201;
                $response->data = [
                    'message' => 'Successfully created!',
                    'data' => $model->attributes,
                    'code' => $response->statusCode
                ];
            } else {
                Yii::warning($model->errors);
                $response->statusCode = 501;
                $response->data = [
                    'message' => 'Not created',
                    'data' => $model->errors,
                    'code' => $response->statusCode
                ];
                return $response;
            }

        } else {
            $response->statusCode = 403;
            $response->data = ['message' => 'Bad Request!', 'code' => $response->statusCode];
            return $response;
        }
    }
}
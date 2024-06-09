<?php

namespace app\controllers;

use Yii;
use yii\web\UploadedFile;

class FeedbackController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new \app\models\Feedback();
    
        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                if($model->save(false)){
                    Yii::$app->session->setFlash('success', 'Отзыв отправлен');
                }
            }
        }
    
        return $this->render('index', [
            'model' => $model,
        ]);
    }
}

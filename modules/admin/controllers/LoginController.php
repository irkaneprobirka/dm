<?php

namespace app\modules\admin\controllers;

use app\models\LoginFormAdmin;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `mfc-panel` module
 */
class LoginController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginFormAdmin();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->session->setFlash('success', 'Вы успешно авторизовались');
            return $this->redirect('/mfc-panel');
        }

        $model->password = '';
        return $this->render('index', [
            'model' => $model,
        ]);
    }
}

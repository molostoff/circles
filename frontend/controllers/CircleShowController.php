<?php

namespace frontend\controllers;



use common\models\Circle;
use yii\web\Controller;

class CircleShowController extends Controller
{
    public function actionIndex()
    {
      return $this->render('index', [ 'circles' => Circle::find()->asArray()->all()]);
    }

}

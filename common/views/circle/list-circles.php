<?php
use yii\helpers\Html;
// use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CircleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Circles';
$this->params['breadcrumbs'][] = $this->title;

use common\widgets\GridWidget;

?>
<div class="circle-index">
	<h1><?= Html::encode($this->title) ?></h1>

		<?php

		GridWidget::begin(
				['searchModel' => $searchModel,
					'dataProvider' => $dataProvider, 'heading' => __FILE__,
					'dataColumns' => [x, y, color]]);
		?>

		<?=Html::a('Create Circle', ['create'], ['class' => 'btn btn-success']) .
			 Html::button('<i class="glyphicon glyphicon-plus"></i>',
			 				['type' => 'button',
			 				 'title' => Yii::t('kvgrid', 'Add Book'),
			 				 'class' => 'btn btn-success',
			 				 'onclick' => 'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' ' .
			 Html::a('<i class="glyphicon glyphicon-repeat"></i>',
			 				['.'],
			 				['data-pjax' => 0, 'class' => 'btn btn-default',
			 				 'title' => Yii::t('kvgrid', 'Reset Grid')])?>

		<?php GridWidget::end();?>

</div>

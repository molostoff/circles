<?php

namespace common\widgets;

use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\base\Widget;

class GridWidget extends Widget {

	public $dataProvider;

	public $searchModel;

	public $fullExportMenu;

	public $dataColumns;

	public $gridColumns;

	public $heading = '<div class="panel-title"><i class="glyphicon glyphicon-book"></i>&nbsp;Заголовок</div>';

	public function init () {
		parent::init();
		if(!$this->dataColumns) {
			$this->dataColumns = array_keys($this->searchModel->attributes);
		}
		$this->gridColumns = array_merge(
				[['class' => 'kartik\grid\SerialColumn']],
				$this->dataColumns,
				[['class' => 'kartik\grid\ActionColumn']]);

		$this->fullExportMenu = ExportMenu::widget(
				['dataProvider' => $this->dataProvider,
					'filterModel' => $this->searchModel,
					'columns' => $this->gridColumns,
					// 'target' => ExportMenu::TARGET_BLANK,
					'fontAwesome' => true,
					// 'asDropdown' => false, // this is important for this
					// case so we just need to get a HTML list
					'dropdownOptions' => ['label' => 'Export All',
						'class' => 'btn btn-default']
        		/* 	'dropdownOptions' => [
        		 'label' => '<i class="glyphicon glyphicon-export"></i> Full111'
        		], */
        ]);
		ob_start();
	}

	public function run () {
		$content = ob_get_clean();
		return GridView::widget(
				['dataProvider' => $this->dataProvider,
					'filterModel' => $this->searchModel,
					'columns' => $this->gridColumns,
					'panel' => ['type' => GridView::TYPE_DEFAULT,
						'heading' => $this->heading,
						'after' => ExportMenu::widget(
								['dataProvider' => $this->dataProvider,
									'filterModel' => $this->searchModel,
									'columns' => $this->gridColumns,
									'target' => ExportMenu::TARGET_BLANK,
									'fontAwesome' => true,
									// 'asDropdown' => false, // this is
									// important for this case so we just need
									// to get a HTML list
									'dropdownOptions' => [
										'label' => 'Export All',
										'class' => 'btn btn-default']])],

					// the toolbar setting is default
					'toolbar' => [['content' => $content], '{export}'],

					// configure your GRID inbuilt export dropdown to include
					// additional items
					'export' => ['fontAwesome' => true,
						'itemsAfter' => [
							'<li role="presentation" class="divider"></li>',
							'<li class="dropdown-header">Выгрузить всё</li>']]]);


	}
}

?>
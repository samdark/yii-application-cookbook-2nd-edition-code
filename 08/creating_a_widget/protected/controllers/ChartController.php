<?php
class ChartController extends CController
{
	public function actionIndex()
	{
		$value = rand(10, 90);
		$this->widget('ext.chart.EChartWidget', array(
			'title' => 'Do you like it?',
			'data' => array(
				$value, 100-$value
			),
			'labels' => array(
				'No',
				'Yes',
			),
		));
	}
}
<?php
class EChartWidget extends CWidget
{
	public $title;
	public $data=array();
	public $labels=array();

	public function run()
	{
		echo "<img src=\"http://chart.apis.google.com/chart?chtt=".urlencode($this->title)."&cht=pc&chs=300x150&chd=".$this->encodeData($this->data)."&chl=".implode('|', $this->labels)."\">";
	}

	protected function encodeData($data)
	{
		$maxValue=max($data);

		$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

		$chartData="s:";
		for($i=0;$i<count($data);$i++)
		{
			$currentValue=$data[$i];
			if($currentValue>-1)
				$chartData.=substr($chars,61*($currentValue/$maxValue),1);
			else
				$chartData.='_';
		}
		return $chartData."&chxt=y&chxl=0:|0|".$maxValue;
	}
}
<?php
class ESmartyViewRenderer extends CApplicationComponent implements IViewRenderer
{
	public $fileExtension='.tpl';
	public $filePermission=0755;

	private $smarty;

	function init()
	{
		Yii::import('application.vendors.smarty.*');

		spl_autoload_unregister(array('YiiBase','autoload'));
		require_once('Smarty.class.php');
		spl_autoload_register(array('YiiBase','autoload'));

		$this->smarty = new Smarty();

		$this->smarty->template_dir = '';
		$compileDir = Yii::app()->getRuntimePath().'/smarty/compiled/';

		if(!file_exists($compileDir)){
			mkdir($compileDir, $this->filePermission, true);
		}

		$this->smarty->compile_dir = $compileDir;
		$this->smarty->assign('Yii', Yii::app());
	}

	/**
	 * Renders a view file.
	 * This method is required by {@link IViewRenderer}.
	 * @param CBaseController the controller or widget who is rendering the view file.
	 * @param string the view file path
	 * @param mixed the data to be passed to the view
	 * @param boolean whether the rendering result should be returned
	 * @return mixed the rendering result, or null if the rendering result is not needed.
	 */
	public function renderFile($context,$sourceFile,$data,$return) {
		// current controller properties will be accessible as {this.property}
		$data['this'] = $context;

		if(!is_file($sourceFile) || ($file=realpath($sourceFile))===false)
			throw new CException(Yii::t('ext','View file "$sourceFile" does not exist.', array('{file}'=>$sourceFile)));

		$this->smarty->assign($data);

		if($return)
			return $this->smarty->fetch($sourceFile);
		else
			$this->smarty->display($sourceFile);
	}
}
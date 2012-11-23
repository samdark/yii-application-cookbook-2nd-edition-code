<?php
class ECompressHtmlFilter extends CFilter
{
	protected function preFilter($filterChain)
	{
		ob_start();
		return parent::preFilter($filterChain);
	}

	protected function postFilter($filterChain)
	{
		$out = ob_get_clean();
		echo preg_replace("~>(\s+|\t+|\n+)<~", "><", $out);

		parent::postFilter($filterChain);
	}
}
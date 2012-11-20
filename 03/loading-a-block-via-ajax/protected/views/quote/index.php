<h2>Quote of the day</h2>
<div id="quote-of-the-day">
	<?php $this->renderPartial('_quote', array(
		'quote' => $quote,
	))?>
</div>
<?php echo CHtml::ajaxLink('Next quote', array('getQuote'), array('update' => '#quote-of-the-day'))?>
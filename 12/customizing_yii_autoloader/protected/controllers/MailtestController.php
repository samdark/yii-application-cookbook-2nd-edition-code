<?php
class MailtestController extends CController
{
	public function actionIndex()
	{
		$mail = new Zend_Mail('utf-8');
		$mail->setHeaderEncoding(Zend_Mime::ENCODING_QUOTEDPRINTABLE);
		$mail->addTo("alexander@example.com", "Alexander Makarov");
		$mail->setFrom("robot@example.com", "Robot");
		$mail->setSubject("Test email");
		$mail->setBodyText("Hello, world!");
		$mail->setBodyHtml("Hello, <strong>world</strong>!");
		$mail->send();

		echo "OK";
	}
}

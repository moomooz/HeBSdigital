<?php

class EmailController extends Controller
{
	public function actionIndex()
	{
		//render email/index.php and send post information out
		$this->render('index', array('email'=>$_POST['EMAIL']));
	}
}
<?php

class SiteController extends Controller
{
	public function actionIndex()
	{
		//setlocal for money formating
		setlocale(LC_MONETARY, 'en_US');
		$Objret= new XML_Form;
		
		//Send to error page if xml document doesn't not exist
		if (!file_exists('cna.xml'))
			$this->redirect(Yii::app()->createUrl('site/error'));
			
		$retOut = simplexml_load_file('cna.xml');
		$counter = count($retOut->user_data);
         
		//foreach loop to place data into index array
		foreach($retOut->user_data as $nodeValue){
	                $id[] = $nodeValue->account_id;
	                $fname[] = $nodeValue->first_name;
			$lname[] = $nodeValue->last_name;
			$emailA[] = $nodeValue->email;
			$address[] = $nodeValue->address;
			$city[] = $nodeValue->city;
			$state[] = $nodeValue->state;
			$zip[] = $nodeValue->zip;
			$cc[] = $nodeValue->country_code;
			$accBAL[] = $nodeValue->account_balance;
		}
		
		//Combine index arrays to make multiple associative arrays with account_id as key
		foreach(array_combine($id, $fname) as $account_id => $first_name) $xmlFNAME[$account_id] = $first_name;
		
		foreach(array_combine($id, $lname) as $account_id => $last_name) $xmlLNAME[$account_id] = $last_name;
		
		foreach(array_combine($id, $emailA) as $account_id => $email) $xmlEMAIL[$account_id] = $email;
		
		foreach(array_combine($id, $address) as $account_id => $add) $xmlADDRESS[$account_id] = $add;
		
		foreach(array_combine($id, $city) as $account_id => $cit) $xmlCITY[$account_id] = $cit;
		
		foreach(array_combine($id, $state) as $account_id => $stat) $xmlSTATE[$account_id] = $stat;
		
		foreach(array_combine($id, $zip) as $account_id => $zipC) $xmlZIP[$account_id] = $zipC;
		
		foreach(array_combine($id, $cc) as $account_id => $CC) $xmlCC[$account_id] = $CC;
		
		foreach(array_combine($id, $accBAL) as $account_id => $balance){
			
			if($balance>=1) $xmlAccColor[$account_id] = "green";
				elseif($balance<=0) $xmlAccColor[$account_id] = "red";
				
			$xmlACCBAL[$account_id] = money_format('%(#2n',$Objret->_tostring($balance));
		}
		
		//render index.php and send associative arrays out
		$this->render('index', array('xmlFNAME'=>$xmlFNAME, 'count'=>$counter, 'xmlLNAME'=>$xmlLNAME,
					     'xmlEMAIL'=>$xmlEMAIL, 'xmlADDRESS'=>$xmlADDRESS, 'xmlCITY'=>$xmlCITY,
					     'xmlSTATE'=>$xmlSTATE, 'xmlZIP'=>$xmlZIP, 'xmlCC'=>$xmlCC, 'xmlACCBAL'=>$xmlACCBAL,
					     'xmlAccColor'=>$xmlAccColor));
	}

	//Logs out the current user and redirect to homepage.
	public function actionLogout()
	{
		$this->redirect(Yii::app()->homeUrl);
	}
}
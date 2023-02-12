<?php

namespace Payline\EasyPay;

Class Visa extends EasyPay{

	public function requestVisaPayment($params){
		try{
			$visaDetails = [
			"amount" =>$params['amount'],
			"currency" =>$params['currency'],
			"name" =>$params['name'],
			"cardno" =>$params['cardno'],
			"cvv" =>$params['cvv'],
			"month" =>$params['month'],
			"year" =>$params['year'],
			"email" =>$params['email'],
			"address" =>$params['address'],
			"city" =>$params['city'],
			"state" =>$params['state'],
			"zip" =>$params['zip'],
			"country" =>$params['country'],
			"phone" =>$params['phone'],
			"reference" =>$params['reference'],
			"reason" =>$params['reason']
			];
			return $this->makeRequest("cardpayment",$visaDetails);
		}
		catch(\Exception $e){
			return $e->getMessage;
		}
	}
}
?>

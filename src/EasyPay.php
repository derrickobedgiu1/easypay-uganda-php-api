<?php 

namespace Payline\EasyPay;

class EasyPay {

  private $baseUrl = 'https://www.easypay.co.ug/api/';
  private $username;
  private $password;
  private $client;

  public function __construct($username, $password) {
    $this->username = $username;
    $this->password = $password;
    $this->client = new GuzzleHttp\Client();
  }

  public function makeRequest($action, $params = []) {
    $requestData = [
      'username' => $this->username,
      'password' => $this->password,
      'action' => $action,
    ];
    $requestData = array_merge($requestData, $params);
    $response = $this->client->post($this->baseUrl, [
      'json' => $requestData
    ]);
    return json_decode($response->getBody(), true);
  }


  public function requestPayment($amount, $currency, $phone, $reference, $reason) {
    $params = [
      'amount' => $amount,
      'currency' => $currency,
      'phone' => $phone,
      'reference' => $reference,
      'reason' => $reason
    ];
    return $this->makeRequest('mmdeposit', $params);
  }


  public function sendPayment($amount, $currency, $phone, $reference) {
    $params = [
      'amount' => $amount,
      'currency' => $currency,
      'phone' => $phone,
      'reference' => $reference
    ];
    return $this->makeRequest('mmpayout', $params);
  }


  public function fetchPaymentStatus($reference) {
    $params = [
      'reference' => $reference
    ];
    return $this->makeRequest('mmstatus', $params);
  }


  public function checkBalance() {
    return $this->makeRequest('checkbalance');
  }


  

}




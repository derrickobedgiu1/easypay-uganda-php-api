<?php 

namespace Payline\EasyPay;

use GuzzleHttp\Client;

class EasyPay {

  private $baseUrl = 'https://www.easypay.co.ug/api/';
  private $username;
  private $password;
  private $client;

  public function __construct($username, $password) {
    $this->username = $username;
    $this->password = $password;
    $this->client = new Client(['timeout' => 10]);
  }

  public function makeRequest($action, $params = []) {
    try {
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
    } catch (Exception $e) {
      return [
        'error' => $e->getMessage()
      ];
    }
  }


  public function requestPayment($amount, $currency, $phone, $reference, $reason) {
    try {
      $params = [
        'amount' => $amount,
        'currency' => $currency,
        'phone' => $phone,
        'reference' => $reference,
        'reason' => $reason
      ];
      return $this->makeRequest('mmdeposit', $params);
    } catch (Exception $e) {
      return [
        'error' => $e->getMessage()
      ];
    }
  }


  public function sendPayment($amount, $currency, $phone, $reference) {
    try {
      $params = [
        'amount' => $amount,
        'currency' => $currency,
        'phone' => $phone,
        'reference' => $reference
      ];
      return $this->makeRequest('mmpayout', $params);
    } catch (Exception $e) {
      return [
        'error' => $e->getMessage()
      ];
    }
  }


  public function fetchPaymentStatus($reference) {
    try {
      $params = [
        'reference' => $reference
      ];
      return $this->makeRequest('mmstatus', $params);
    } catch (Exception $e) {
      return [
        'error' => $e->getMessage()
      ];
    }
  }


  public function checkBalance() {
    try {
      return $this->makeRequest('checkbalance');
    } catch (Exception $e) {
      return [
        'error' => $e->getMessage()
      ];
    }
  }
}
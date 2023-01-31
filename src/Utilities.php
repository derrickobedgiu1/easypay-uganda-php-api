<?php

namespace Payline\EasyPay

class Utilities extends EasyPay {
    public function validateYakaNumber($account, $amount = null) {
        $params = [
          'provider' => 'umeme',
          'account' => $account
        ];
    
        if ($amount) {
          $params['amount'] = $amount;
        }
    
        return $this->makeRequest('paybilladvice', $params);
      }


    public function payForYaka($account, $amount, $phone, $reference) {
        return $this->makeRequest("paybill", [
          'provider' => 'umeme',
          'account' => $account,
          'amount' => $amount,
          'phone' => $phone,
          'reference' => $reference
        ]);
      }


    public function checkYakaPaymentStatus($reference) {
        return $this->makeRequest('paybillstatus', [
          'provider' => 'umeme',
          'reference' => $reference,
        ]);
      }


    public function televisionBundles($provider) {

        $providers = array("gotv", "dstv");
        if (!in_array($provider, $providers)) {
            return "Invalid provider. Available options are: " . implode(", ", $providers);
        }

        $requestData = [
          'provider' => $provider,
        ];
        return $this->makeRequest("paybillbundles", $requestData);
      }


    public function validateTelevisionProvider($provider, $account) {
        $requestData = [
          'provider' => $provider,
          'account' => $account,
        ];
        return $this->makeRequest("paybilladvice", $requestData);
      }


    public function payTelevision($params) {
        $requestData = [
        'provider' => $params['provider'],
        'phone' => $params['phone'],
        'amount' => $params['amount'],
        'account' => $params['account'],
        'bundleId' => $params['bundleId'],
        'reference' => $params['reference'],
        ];
        return $this->makeRequest("paybill", $requestData);
        }


    public function checkTvPayment($provider, $reference) {
            $requestData = [
              'provider' => $provider,
              'reference' => $reference,
            ];
            return $this->makeRequest("paybillstatus", $requestData);
          }


    public function nwscAreas() {
            $requestData = [
              'provider' => 'nwsc',
            ];
            return $this->makeRequest("paybillbundles", $requestData);
          }


    public function validateNwscNumber($account, $location) {
            $requestData = [
              'provider' => 'nwsc',
              'account' => $account,
              'location' => $location,
            ];
            return $this->makeRequest("paybilladvice", $requestData);
          }


    public function payNwsc($phone, $amount, $account, $location, $reference) {
            $requestData = [
              'provider' => "nwsc",
              'phone' => $phone,
              'amount' => $amount,
              'account' => $account,
              'location' => $location,
              'reference' => $reference,
            ];
            return $this->makeRequest("paybill", $requestData);
          }


    public function checkNwscPaymentStatus($reference) {
            return $this->makeRequest("paybillstatus", $reference);
          }
}

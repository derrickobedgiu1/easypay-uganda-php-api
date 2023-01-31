<?php

namespace Payline\EasyPay

class AirtimeBundles extends EasyPay {
    public function fetchBundles($provider) {
      return $this->makeRequest('paybillbundles', [
        'provider' => $provider
      ]);
    }


    public function validateBundleNumber($provider, $account) {
        return $this->makeRequest("paybilladvice", [
          "provider" => $provider,
          "account" => $account
        ]);
      }


    public function buyBundles($params) {
        return $this->makeRequest('paybill', [
          'provider' => $params['provider'],
          'phone' => $params['phone'],
          'amount' => $params['amount'],
          'account' => $params['account'],
          'bundleId' => $params['bundleId'],
          'reference' => $params['reference']
        ]);
      }


    public function checkBundleStatus($provider,$reference){
        return $this->makeRequest('paybillstatus', [
            'provider' => $params['provider'],
            'reference' => $params['reference']
          ]);
    }
  }
  
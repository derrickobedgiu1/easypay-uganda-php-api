<?php

namespace Payline;

class AirtimeBundles extends EasyPay {
    public function fetchBundles($provider) {
      try {
        return $this->makeRequest('paybillbundles', [
          'provider' => $provider
        ]);
      } catch (\Exception $e) {
        return $e->getMessage();
      }
    }


    public function validateBundleNumber($provider, $account) {
      try {
        return $this->makeRequest("paybilladvice", [
          "provider" => $provider,
          "account" => $account
        ]);
      } catch (\Exception $e) {
        return $e->getMessage();
      }
    }


    public function buyBundles($params) {
      try {
        return $this->makeRequest('paybill', [
          'provider' => $params['provider'],
          'phone' => $params['phone'],
          'amount' => $params['amount'],
          'account' => $params['account'],
          'bundleId' => $params['bundleId'],
          'reference' => $params['reference']
        ]);
      } catch (\Exception $e) {
        return $e->getMessage();
      }
    }


    public function checkBundleStatus($provider,$reference){
      try {
        return $this->makeRequest('paybillstatus', [
            'provider' => $params['provider'],
            'reference' => $params['reference']
          ]);
      } catch (\Exception $e) {
        return $e->getMessage();
      }
    }

  }
  
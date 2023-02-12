<?php

namespace Payline;

class Utilities extends EasyPay {
    public function validateYakaNumber($account, $amount = null) {
        try {
            $params = [
              'provider' => 'umeme',
              'account' => $account
            ];
        
            if ($amount) {
              $params['amount'] = $amount;
            }
        
            return $this->makeRequest('paybilladvice', $params);
        } catch (\Exception $e) {
            return "An error occured: " . $e->getMessage();
        }
    }

    public function payForYaka($account, $amount, $phone, $reference) {
        try {
            return $this->makeRequest("paybill", [
              'provider' => 'umeme',
              'account' => $account,
              'amount' => $amount,
              'phone' => $phone,
              'reference' => $reference
            ]);
        } catch (\Exception $e) {
            return "An error occured: " . $e->getMessage();
        }
    }

    public function checkYakaPaymentStatus($reference) {
        try {
            return $this->makeRequest('paybillstatus', [
              'provider' => 'umeme',
              'reference' => $reference,
            ]);
        } catch (\Exception $e) {
            return "An error occured: " . $e->getMessage();
        }
    }

    public function televisionBundles($provider) {
        try {
            $providers = array("gotv", "dstv");
            if (!in_array($provider, $providers)) {
                return "Invalid provider. Available options are: " . implode(", ", $providers);
            }
    
            $requestData = [
              'provider' => $provider,
            ];
            return $this->makeRequest("paybillbundles", $requestData);
        } catch (\Exception $e) {
            return "An error occured: " . $e->getMessage();
        }
    }

    public function validateTelevisionProvider($provider, $account) {
        try {
            $requestData = [
              'provider' => $provider,
              'account' => $account,
            ];
            return $this->makeRequest("paybilladvice", $requestData);
        } catch (\Exception $e) {
            return "An error occured: " . $e->getMessage();
        }
    }

    public function payTelevision($params) {
        try {
        $requestData = [
        'provider' => $params['provider'],
        'phone' => $params['phone'],
        'amount' => $params['amount'],
        'account' => $params['account'],
        'bundleId' => $params['bundleId'],
        'reference' => $params['reference'],
        ];
        return $this->makeRequest("paybill", $requestData);
        } catch (\Exception $e) {
        return $e->getMessage();
        }
        }

        public function checkTvPayment($provider, $reference) {
        try {
        $requestData = [
        'provider' => $provider,
        'reference' => $reference,
        ];
        return $this->makeRequest("paybillstatus", $requestData);
        } catch (\Exception $e) {
        return $e->getMessage();
        }
        }

        public function nwscAreas() {
        try {
        $requestData = [
        'provider' => 'nwsc',
        ];
        return $this->makeRequest("paybillbundles", $requestData);
        } catch (\Exception $e) {
        return $e->getMessage();
        }
        }

        public function validateNwscNumber($account, $location) {
        try {
        $requestData = [
        'provider' => 'nwsc',
        'account' => $account,
        'location' => $location,
        ];
        return $this->makeRequest("paybilladvice", $requestData);
        } catch (\Exception $e) {
        return $e->getMessage();
        }
        }

        public function payNwsc($phone, $amount, $account, $location, $reference) {
        try {
        $requestData = [
        'provider' => "nwsc",
        'phone' => $phone,
        'amount' => $amount,
        'account' => $account,
        'location' => $location,
        'reference' => $reference,
        ];
        return $this->makeRequest("paybill", $requestData);
        } catch (\Exception $e) {
        return $e->getMessage();
        }
        }

        public function checkNwscPaymentStatus($reference) {
        try {
        return $this->makeRequest("paybillstatus", $reference);
        } catch (\Exception $e) {
        return $e->getMessage();
        }
        }

}
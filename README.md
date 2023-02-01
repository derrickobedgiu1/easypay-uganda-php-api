# EasyPay Uganda PHP Payment API

## What is EasyPay Uganda Payment API
Easypay Mobile Wallet is owned by Payline Holdings (U) Ltd.

Payline Holdings is one of Uganda’s leading and advanced providers of Online Payment Solutions. Payline Holdings brings together more than 20 years of rich industry experience extrapolating its flexible and entrepreneurial services to clients. We are passionate about client satisfaction, which underpins our delivery framework to provide the highest quality in technology service

## Getting Started with EasyPay Uganda PHP API

1. Easypay account; First things first, you need to register for an easypay account. Registration is free and painless. [Register for an easypay account](https://www.easypay.co.ug/kb/knowledge-base/how-to-register-for-an-easypay-account/ "Register for an easypay account"). Once you have registered and signed in, you will have to enable your API from within the app, so as you can get your credentials in real time.
    
2. The API is very simple and live so there is no sandbox environment. This helps you get integrated in a matter of minutes,test and get the feel of the API. Then Gotcha.  By default new accounts are limited to certain amount of money worth of transactions they can make depending on the category of requests they're making. These are intended for testing purposes. To remove this limitation, you will have to contact them with your company details (KYC) via our inbuilt chat within app.

Minimum Requirements: To run the SDK, your system will require **PHP >= 7.4** and requests should be made from an HTTPS protocol

## Installation
Add the following lines to your `composer.json`:
```php
"repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/derrickobedgiu1/easypay-uganda-php-api.git"
        }
    ],
"require": {
    //Your libraries,
    "derrickobedgiu1/whatsapp-cloud-api": "*"
}
```
Delete your `composer.lock` file from your project then run ```composer install``` to reinstall your packages including this SDK
## Quick Examples

### Passing your Credentials in the SDK
Below is the default way of passing in your credentials to the SDK. The example calls all the Classes in a single file, you may want to include only what your files need.
```php
<?php
// Require the Composer autoloader.
require 'vendor/autoload.php';

//To use the EasyPay Class
use Payline\Easypay\Easypay;

//To use the Utilities Class
use Payline\Easypay\Utilities;

//To use the AirtimeBundle Class
use Payline\Easypay\AirtimeBundle;


$username = "Your API ClientId";
$password = "Your API ClientSecret";

//Pass the Credentials in the Classes you'll be using
$easyPay = new EasyPay($username,$pasword);
$utilities = new Utilities($username,$password);
$airbundles = new AirtimeBundles($username,$password);
?>
```

### Check your EasyPay Account Balance
This is useful when you want to know your current balance at EasyPay. You can use this to notify you that your balance is running low. That way you can ensure you do not run out of float.
```php
<?php
require 'vendor/autoload.php';

//To use the EasyPay Class
use Payline\Easypay\Easypay;

$username = "Your API ClientId";
$password = "Your API ClientSecret";

//Pass the Credentials in the Classes you'll be using
$easyPay = new EasyPay($username,$pasword);

$balance = $easyPay->checkBalance();
//print the arrays returned
echo "<pre>";
echo print_r($bal);
echo "</pre>";
?>
```
<u>Success Result</u>
```
(
    [success] => 1
    [data] => 15000
    [currencyCode] => UGX
)
```
<u>Failure Result</u>
```
(
    [success] => 1
    [errormsg] => API Authentication failed
)
```
### Request Money from Mobile User
This is useful when you want to move funds from your customer's mobile money account into your EasyPay wallet. MTN, Airtel, Africell and UTL m-sente supported.
```php
<?php
require 'vendor/autoload.php';

//To use the EasyPay Class
use Payline\Easypay\Easypay;

$username = "Your API ClientId";
$password = "Your API ClientSecret";

//Pass the Credentials in the Classes you'll be using
$easyPay = new EasyPay($username,$pasword);

//Get the Payment Details
$amount = "";
$currency = "";
$phone = "";
$reference = "";
$reason = "";

//Request Payment from User
$pay = $easyPay->requestPayment($amount, $currency, $phone, $reference, $reason);
?>
```
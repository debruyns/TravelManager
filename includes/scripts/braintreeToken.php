<?php

// Root location
$path = $_SERVER['DOCUMENT_ROOT'];

require_once($path . "/includes/payments/Configuration.php");
require_once($path . "/includes/payments/ClientToken.php");

use Braintree;

Configuration::environment('sandbox');
Configuration::merchantId('mbc2kjh4pdqf3xht');
Configuration::publicKey('vcgk7j7tpzrp5238');
Configuration::privateKey('a8c8a20106cbf85a269595ab936d2286');

echo ClientToken::generate();


?>

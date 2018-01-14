<?php

// Root location
$path = $_SERVER['DOCUMENT_ROOT'];

require_once($path . "/includes/payments/Braintree.php");

Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('mbc2kjh4pdqf3xht');
Braintree_Configuration::publicKey('vcgk7j7tpzrp5238');
Braintree_Configuration::privateKey('a8c8a20106cbf85a269595ab936d2286');

?>

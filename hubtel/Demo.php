<?php

// Let us test the SDK
require 'hubtel/vendor/autoload.php';

$auth = new BasicAuth("ryuouvga", "yhrcgpde");

// instance of ApiHost
$apiHost = new ApiHost($auth);

// instance of AccountApi
// $accountApi = new AccountApi($apiHost);

// set web console logging to false
$disableConsoleLogging = false;

// Let us try to send some message
$messagingApi = new MessagingApi($apiHost, $disableConsoleLogging);


<?php
require_once '/var/www/htdocs/assignment/vendor/autoload.php';

use Twilio\Rest\Client;

$sid = "ACee006020cd72d4f0cc94a9816a140aeb";
$token = "3af356a021a135fdb7ee79855b194690";
$twilio = new Client($sid, $token);
$message = $twilio->messages
    ->create("+61404194299", // to
            [
                "body" => "You have just logged in to EDStem",
                "from" => "+16074247291"
            ]
    );
print($message->sid);
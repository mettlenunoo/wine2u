<?php

require 'vendor/autoload.php';
use Mailgun\Mailgun;

# Instantiate the client with option to disable ssl verfication.

# First, instantiate the SDK with your API credentials
$mg = Mailgun::create('key-8c3cce87820d5d19025f90a7e40b8296');

# Now, compose and send your message.
# $mg->messages()->send($domain, $params);
$mg->messages()->send('hvafrica.com', [
  'from'    => 'bob@example.com',
  'to'      => 'dabdulmanan@gmail.com',
  'subject' => 'The PHP SDK is awesome!',
  'text'    => 'It is so simple to send a message.'
]);
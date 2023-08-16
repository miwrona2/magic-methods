<?php
echo 'Hello World!';

require ('../vendor/autoload.php');

use MichalWrona\PhpStarter\Client;

$magic = new Client();
print $magic->execute();
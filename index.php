<?php

require('autoload.php');
$bot = new \TelegramBot\Api\BotApi('708119130:AAFDvACs0tcEGp3BMo9Js35IOR8nwg1-hGQ');
$firebase  = new \FireBase\Api\Api();
$inputdata = file_get_contents('php://input');
$update = json_decode($inputdata, TRUE);

$replyController = new \Reply\ReplyController('Func',$update['message']['text']);

$msg = $replyController->returnExecute();

$firebase->set($update['message']['chat']['id'],explode("\n",$msg)[0]);

$bot->sendMessage($update['message']['chat']['id'],$msg);

?>

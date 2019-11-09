<?php

require('vendor/autoload.php');

$curl = new Curl\Curl();

$text = isset($_GET['text']) ? $_GET['text'] : 0;

$curl->get('http://secureapp.simsimi.com/v1/simsimi/talkset', [
    'uid' => 269923497,
    'av' => '6.8.7.9',
    'lc' => 'vn',
    'cc' => 'VN',
    'tz' => 'Asia/Saigon',
    'os' => 'a',
    'ak' => '/64IQUHtFqRRaDrmExNnVUbPKoY=',
    'message_sentence' => $text,
    'normalProb' => 8,
    'isFilter' => 1,
    'talkCnt' =>4,
    'talkCntTotal' => 4,
    'reqFilter' => 1,
    'session' => 'D8ZBz57MvjfaWd7py8ifzkb615puFJRyHGC4ucCdBxLxfkpoUveZXjTSVN9LN2FQGnDNZ12Gs18BRtmdYs8H2kC5'
]);

$data = json_decode($curl->response, true)['simsimi_talk_set']['answers'][0]['sentence'];

$curl->close();

$chatfuel = new Chatfuel\Chatfuel(TRUE);

$chatfuel->sendText($data);
    
    
<?php

sendMessage($_POST);

function tg($url, $params)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url . $params);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 3);
    $content = curl_exec($curl);
    curl_close($curl);
    return json_decode($content, true); // change array or object to json
}

function sendMessage($test) {
    // dd($chat);
    $key = 'bot1232789097:AAF98KvRW_0OrnO0R4u77E07BDfw89ioPB4';
    $chat = tg('https://api.telegram.org/' . $key . '/getUpdates', ''); // ngambil history chat bot

    if ($chat['ok']) { // jika value dari key ok true
        $text = 'nama depan : ' . $test['depan'] . ' nama belakang : ' . $test['belakang'];
        $text = urlencode($text); // convert string atau karakter ke format url yang valid
        //  dd($text);
    }

    // -1001161561087 id gorup qodrhq
    // -450440113 id group test
    // -1056299090 user ?
    // -1001158901287 test chanel
    return tg('https://api.telegram.org/' . $key . '/sendMessage', '?chat_id=-410231225&text=' . $text);
}
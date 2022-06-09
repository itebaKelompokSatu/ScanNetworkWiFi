<?php

   // terima data dari NodeMCU V3
   $data = $_POST['data'];
   //echo $data;
    
    $telegram_id = "-722033089";
    $message_text = $data;
    $secret_token = "5288404408:AAGbv1XzoLiDip7yIrAwhSGYKGAciPplr_0";
    
    $url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message_text);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
   
?>
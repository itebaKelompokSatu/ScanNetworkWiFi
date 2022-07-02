<?php

    require_once 'Constants.php';
    $konek = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $secret_token = "5288404408:AAGbv1XzoLiDip7yIrAwhSGYKGAciPplr_0";
    $path = "https://api.telegram.org/bot" . $secret_token;
    $update = json_decode(file_get_contents("php://input"), TRUE);
    $chatId = $update["message"]["chat"]["id"];
    $message = $update["message"]["text"];
    
    if (strpos($message, "/info") === 0) {
        
        $teks = "Silahkan kirim perintah berikut untuk melihat data dBm jaringan WiFi.\n/mulai = untuk menampilkan data.\n/stop   = untuk menghentikan.";
        send($teks);
        
    } elseif (strpos($message, "/mulai") === 0) {
        
        $teks = "Data Pencarian Ditampilkan";
        send($teks);
        
        $sql = mysqli_query($konek, "UPDATE `dbm` SET `nama` = 'data' WHERE `id` = '1'");

    } elseif (strpos($message, "/stop") === 0) {
        
        $teks = "Data Pencarian Selesai";
        send($teks);
        
        $sql = mysqli_query($konek, "UPDATE `dbm` SET `nama` = 'dataa' WHERE `id` = '1'");
    }
    
    
    function send($isi) {
    
        $telegram_id = "-722033089";
        $message_text = $isi;
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
    }
    
    
?>




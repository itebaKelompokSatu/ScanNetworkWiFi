<?php

    echo "
    
        <div style='width: 70%'>
        <img src='gambar/logo_iteba.png' style='margin-left: 50px; width: 20%'>
            <div style='float: right'>
            <h2>Tugas mata kuliah Komunikasi Data</h2>
            <b>Kelompok 1</b><br>
            <a>1. Johanes Wilian Ang (1822002)</a><br>
            <a>2. Erwin Erikson (1822003)</a><br>
            <a>3. Johnny (1822004)</a><br>
            <a>4. Andrian Syah (1922009)</a>
            <div>
        </div><br>
    
        <div style='margin-left: 0px'>
            <form action='' method='POST'>
                Isi Pesan   : <textarea name='pesan' style='width: 500px; padding: 5px'></textarea><br><br>
                <input type='submit' value='Kirim Pesan' style='margin-left: 100px'>
            </form>
        </div>
    
    ";

    if(isset($_POST['pesan'])) {
        
        $telegram_id = "-722033089";
        $message_text = $_POST['pesan'];
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
        
        echo "<script>alert('Pesan berhasil terkirim'); window.location.href = './';</script>";
    }

?>




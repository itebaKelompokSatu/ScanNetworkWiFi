<img src="Gambar/logo_iteba.png" alt="Logo Iteba" width="200"/>

# Tugas Besar Komunikasi Data Kelompok 1

### Anggota:<br>1. Johanes Wilian Ang (1822002)<br>2. Erwin Erikson (1822003)<br>3. Johnny (1822004)<br>4. Andrian Syah (1922009)

<br>

# __dBmWiFi Server BotTelegram__
Program memindai jaringan WiFi dan mengetahui kekuatan sinyal masing-masing jaringan dalam dBm menggunakan NodeMCU V3.

Data hasil pemindaian NodeMCU V3 akan dikirim ke Telegram menggunakan channel BotFather melalui webserver setelah pengguna mengirim perintah ke bot sesuai intruksi di "/info".

Untuk menerima pembaruan pada bot ini menggunakan metode Webhook. 

### Langkah-langkah:
<ol>
    <li>Persiapkan perangkat NodeMCU V3.<br><img src="Gambar/nodemcu.jpg" alt="NodeMCU V3" width="250" style="margin-left: 20px"/><br><br></li>
    <li>Upload sketch_dBm_server_telegram ke NodeMCU V3 menggunakan Arduino IDE.<br><img src="Gambar/arduino_ide.jpg" alt="NodeMCU V3" width="250" style="margin-left: 20px"/><br><br></li>
    <li>Upload file <b>datadBm.php</b> ke webserver di subdomain <b>chat.aldikadek.my.id</b><br><img src="Gambar/webserver.jpg" alt="NodeMCU V3" width="450" style="margin-left: 20px"/></li>
</ol>






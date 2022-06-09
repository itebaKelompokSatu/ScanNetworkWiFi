
#include <ESP8266WiFi.h>
#include <WiFiClient.h> 
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>

// konfigurasi jaringan wifi
const char* ssid = "Aldikadek";
const char* password = "Db2ibmrd7";

#define PIN_LED 2             // inisialisasi LED di pin 2

const int RSSI_MAX =-50;      // menentukan kekuatan sinyal maksimum dalam dBm
const int RSSI_MIN =-100;     // menentukan kekuatan sinyal minimum dalam dBm

String s = "Mencari Sinyal WiFi...";
String t = "  jaringan ditemukan.";
String u = "";
String za = "\n";

void setup() {
  delay(1000);
  Serial.begin(115200);
  WiFi.mode(WIFI_OFF);        
  delay(1000);
  WiFi.mode(WIFI_STA);        // Set WiFi ke mode stasiun
  //WiFi.disconnect();
  delay(2000);
  pinMode(PIN_LED, OUTPUT);

  // setting koneksi
  Serial.println();
  Serial.println();
  Serial.print("Koneksi ke ");
  Serial.println(ssid);

  WiFi.begin(ssid, password);

  // cek koneksi
  while(WiFi.status() != WL_CONNECTED){
      
      digitalWrite(PIN_LED, HIGH);     // LED mati

      // NodeMCU akan terus mencoba koneksi
      Serial.print(".");
      delay(500);
  }

  // bila terkoneksi
  digitalWrite(PIN_LED, LOW);          // LED menyala
  // tampilkan di serial monitor
  Serial.println("");
  Serial.println("WiFi Terkoneksi");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
  Serial.print("Netmask: ");
  Serial.println(WiFi.subnetMask());
  Serial.print("Gateway: ");
  Serial.println(WiFi.gatewayIP());
}

void loop() {
  Serial.println(s);
  kirimData(s);

  int n = WiFi.scanNetworks();
  String sn = String(n);
  
  if (n == 0) {
    Serial.println("  Jaringan tidak ditemukan.");
  } else {
    String a = sn + t + za + za;
    
    u = "";
    for (int i = 0; i < n; ++i) {
      int v = i + 1;
      String nv = String(v) + ") ";
      String w = String(WiFi.SSID(i)) + "  ";
      String x = String(WiFi.RSSI(i)) + "dBm";
      String y = nv + w + x + za;
      u = u + y;

      delay(10);
    }
    Serial.println(a);
    Serial.println(u);
    String zu = a + u;
    kirimData(zu);
    u = "";
    zu = "";
  }
  Serial.println("");

  delay(5000);
  WiFi.scanDelete();  
}

void kirimData(String isi) {
    String postData = (String)"data=" + isi;
    
    // cek koneksi ke server
    HTTPClient http;
    http.begin("http://chat.aldikadek.my.id/datadBm.php");
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    
    auto httpCode = http.POST(postData);
    String isiData = http.getString();

    Serial.println(postData); 
    Serial.println(isiData);   
  
    http.end();
    delay(3000);
}




//

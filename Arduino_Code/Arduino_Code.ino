#include <Arduino.h> // library arduino 

// Wifi
#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>

#define USE_SERIAL Serial
ESP8266WiFiMulti WiFiMulti;
HTTPClient http;

#include <BlynkSimpleEsp8266.h> // library blynk untuk timer
#include <TimeLib.h> // library timer

BlynkTimer timer; // variabel

int mb1_waktu = 0, mb2_waktu = 0, mb1_waktu_s = 0, mb2_waktu_s = 0;

// lcd
#include <LiquidCrystal_I2C.h>
LiquidCrystal_I2C lcd(0x27, 16, 2);

// IR
#define ir_mobil_1 D5
#define ir_mobil_2 D6

// Button
#define button_mulai D7
#define button_stop D8

// LED
#define led_hijau D2
#define led_merah D9

// Buzzer
#define buzzer D10

int lap_mobil_1 = 0;
int lap_mobil_2 = 0;

boolean mulai = false, notif_buzzer = false;

String status_alat = "Stop", respon;

String simpan = "http://laprace.setiaone.online/Simpan/save?ket_mobil="; //  alamst pengiriman data
String awal = "http://laprace.setiaone.online/Simpan/mulai?ket=Mulai"; //  alamst pengiriman data

void setup() {
  Serial.begin(115200); // baudrate
  USE_SERIAL.begin(115200);
  USE_SERIAL.setDebugOutput(false);

  lcd.init();
  lcd.backlight();
  lcd.setCursor(3, 0);
  lcd.print("MONITORING");
  lcd.setCursor(1, 1);
  lcd.print("PUTARAN TAMIYA");

  WiFi.mode(WIFI_STA);
  WiFiMulti.addAP("Tamiya", "12345678");

  Serial.println(); //

  for (int u = 1; u <= 5; u++)
  {
    if ((WiFiMulti.run() == WL_CONNECTED))
    {
      USE_SERIAL.println("Alhamdulillah wifi konek");
      USE_SERIAL.flush();
      delay(1000);
    }
    else
    {
      Serial.println("Hmmm wifi belum konek");
      delay(1000);
    }
  }

  pinMode(ir_mobil_1, INPUT_PULLUP);
  pinMode(ir_mobil_2, INPUT_PULLUP);
  pinMode(button_mulai, INPUT_PULLUP);
  pinMode(button_stop, INPUT_PULLUP);
  pinMode(led_hijau, OUTPUT);
  pinMode(led_merah, OUTPUT);
  pinMode(buzzer, OUTPUT);

  digitalWrite(led_merah, LOW);
  digitalWrite(led_hijau, LOW);
  digitalWrite(buzzer, LOW);

  setSyncInterval(1 * 60); // kirim data perdetik ke blynk
  
  // Display digital clock every 10 seconds
  timer.setInterval(1000L, hitungWaktu_1); // 1 detik
  
}

void loop() {

  if (digitalRead(button_mulai) == LOW)
  {
    status_alat = "Mulai";
    Serial.println("Mulai");
  }
  if (digitalRead(button_stop) == LOW)
  {
    status_alat = "Stop";
    Serial.println("Stop");

    lap_mobil_1 = 0;
    lap_mobil_2 = 0;
    mb1_waktu = 0;
    mb2_waktu = 0;

    digitalWrite(led_merah, LOW);
    digitalWrite(led_hijau, LOW);
    digitalWrite(buzzer, LOW);
  }

  if (status_alat == "Mulai")
  {
    if (mulai == false)
    {
      mulai_awal();
      
      digitalWrite(led_merah, HIGH);
      digitalWrite(buzzer, HIGH); // 1
      delay(1000);
      digitalWrite(buzzer, LOW);
      delay(300);
      digitalWrite(buzzer, HIGH); // 2
      delay(1000);
      digitalWrite(buzzer, LOW);
      delay(300);
      digitalWrite(buzzer, HIGH); // 3
      delay(1000);
      digitalWrite(buzzer, LOW);
      digitalWrite(led_merah, LOW);
      digitalWrite(led_hijau, HIGH);
      
      mb1_waktu_s = second();
      mb2_waktu_s = second();
      mulai = true;
    }
    timer.run();
    Serial.print("Waktu Tempuh Mobil 1 : ");
    Serial.print(mb1_waktu);
    Serial.println(" detik");

    Serial.print("Waktu Tempuh Mobil 2 : ");
    Serial.print(mb2_waktu);
    Serial.println(" detik");

    if (digitalRead(ir_mobil_1) == LOW)
    {
      lap_mobil_1 += 1; // lap_mobil_1 + 1

      if (lap_mobil_1 <= 5) // nambah lap
      {
        simpan_database(1, lap_mobil_1, mb1_waktu); // void 
      }
      
      mb1_waktu_s = second();
    }
    if (digitalRead(ir_mobil_2) == LOW)
    {
      lap_mobil_2 += 1;

      if (lap_mobil_2 <= 5) // nambah lap
      {
        simpan_database(2, lap_mobil_2, mb2_waktu); 
      }
      
      mb2_waktu_s = second();
    }
  }
  else
  {
    mulai = false;
  }

  lcd.clear();

  if (lap_mobil_1 <= 4) // nambah lap
  {
    lcd.setCursor(0, 0);
    lcd.print("Mb1 : ");
    lcd.setCursor(6, 0);
    lcd.print(lap_mobil_1);
    lcd.setCursor(0,1);
    lcd.print("W : ");
    lcd.setCursor(4, 1);
    lcd.print(mb1_waktu);
    lcd.setCursor(6, 1);
    lcd.print("s");
  }
  else // jika lap lebih dari 4
  {
    lcd.setCursor(0, 0);
    lcd.print("Mb1 : ");
    lcd.setCursor(6, 0);
    lcd.print("F");
    lcd.setCursor(0, 1);
    lcd.print("W : ");
    lcd.setCursor(4, 1);
    lcd.print("0");
    lcd.setCursor(6, 1);
    lcd.print("s");
  }

  if (lap_mobil_2 <= 4) // nambah lap
  {
    lcd.setCursor(8, 0);
    lcd.print("Mb2 : ");
    lcd.setCursor(14, 0);
    lcd.print(lap_mobil_2);
    lcd.setCursor(8, 1);
    lcd.print("W : ");
    lcd.setCursor(12, 1);
    lcd.print(mb2_waktu);
    lcd.setCursor(14, 1);
    lcd.print("s");
  }
  else // jika lap lebih dari 4
  {
    lcd.setCursor(8, 0);
    lcd.print("Mb2 : ");
    lcd.setCursor(14, 0);
    lcd.print("F"); 
    lcd.setCursor(8, 1);
    lcd.print("W : ");
    lcd.setCursor(12, 1);
    lcd.print("0");
    lcd.setCursor(14, 1);
    lcd.print("s");
  }

  if (lap_mobil_1 > 4 && lap_mobil_2 > 4)
  {
    status_alat = "Stop";
    Serial.println("Finish");

    lap_mobil_1 = 0;
    lap_mobil_2 = 0;
    mb1_waktu = 0;
    mb2_waktu = 0;

    digitalWrite(led_merah, LOW);
    digitalWrite(led_hijau, LOW);
    digitalWrite(buzzer, LOW);
  }
  else if (lap_mobil_1 > 4 || lap_mobil_2 > 4)
  {
    digitalWrite(buzzer, HIGH);
  }

  delay(500);

}

void hitungWaktu_1()//untuk mengambil data waktu sekarang dan tanggal sekarang
{
  if (lap_mobil_1 <= 4) // nambah lap
  {
    if (second() < mb1_waktu_s)
    {
      mb1_waktu = 60 - (mb1_waktu_s - second());
    }
    else
    {
      mb1_waktu = second() - mb1_waktu_s;
    }
  }
  else
  {
    mb1_waktu = 0;
  }
  
  if (lap_mobil_2 <= 4) // nambah lap
  {
    if (second() < mb2_waktu_s)
    {
      mb2_waktu = 60 - (mb2_waktu_s - second());
    }
    else
    {
      mb2_waktu = second() - mb2_waktu_s;
    }
  }
  else
  {
    mb2_waktu = 0;
  }
}

void simpan_database(int ket_mobil, int lap, int waktu_tempuh)
{
  if ((WiFiMulti.run() == WL_CONNECTED)) // jika wifi konek
  {
    USE_SERIAL.print("[HTTP] Memulai...\n");
    
    http.begin( simpan + (String) ket_mobil + "&lap=" + (String) lap + "&waktu=" + (String) waktu_tempuh );
    
    USE_SERIAL.print("[HTTP] Simpan data lap dan waktu ke database ...\n");
    int httpCode = http.GET();

    if(httpCode > 0)
    {
      USE_SERIAL.printf("[HTTP] kode response GET : %d\n", httpCode);

      if (httpCode == HTTP_CODE_OK) // jika respon 200 atau file Data.php ditemukan
      {
        respon = http.getString(); // ambil nilai yg dikirim dari File Simpan.php
        USE_SERIAL.println("Respon : " + respon);
        delay(200);
      }
    }
    else
    {
      USE_SERIAL.printf("[HTTP] GET data gagal, error: %s\n", http.errorToString(httpCode).c_str());
    }
    http.end();
  }
}

void mulai_awal()
{
  if ((WiFiMulti.run() == WL_CONNECTED)) // jika wifi konek
  {
    USE_SERIAL.print("[HTTP] Memulai...\n");
    
    http.begin( awal );
    
    USE_SERIAL.print("[HTTP] Mulai awal ...\n");
    int httpCode = http.GET();

    if(httpCode > 0)
    {
      USE_SERIAL.printf("[HTTP] kode response GET : %d\n", httpCode);

      if (httpCode == HTTP_CODE_OK) // jika respon 200 atau file Data.php ditemukan
      {
        respon = http.getString(); // ambil nilai yg dikirim dari File Simpan.php
        USE_SERIAL.println("Respon : " + respon);
        delay(200);
      }
    }
    else
    {
      USE_SERIAL.printf("[HTTP] GET data gagal, error: %s\n", http.errorToString(httpCode).c_str());
    }
    http.end();
  }
}

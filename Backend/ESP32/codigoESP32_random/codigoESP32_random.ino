#include <HTTPClient.h>
#include <WiFi.h>
#include <OneWire.h>
#include <DallasTemperature.h>
#include <Wire.h>
#include <hd44780.h>
#include <hd44780ioClass/hd44780_I2Cexp.h>
#include <time.h>
#include "sys/time.h"


// Define o caractere especial (símbolo de grau)
byte degreeSymbol[8] = {
  B00111,
  B00101,
  B00111,
  B00000,
  B00000,
  B00000,
  B00000,
};

// Dados Wi-Fi
const char* ssid = "S23FE";
const char* password = "55555555";

float temperatura;
int qualidade_agua;

// Configuração do sensor de temperatura
const int oneWireBus = 4;
OneWire oneWire(oneWireBus);
DallasTemperature sensors(&oneWire);

// Dados da API PHP
const char* api_url = "http://192.168.1.10/Neptune/SisNeptuneTCC/Backend/API/api.php";

// LCD
hd44780_I2Cexp lcd; // Instanciação do objeto lcd

// Define o fuso horário para São Paulo
const char* timezone = "BRT3BRST,M10.3.0/0,M2.3.0/0";

void setup() {
  Serial.begin(115200);
  sensors.begin();

  // Inicialização do LCD
  lcd.begin(16, 2);

  // Cria o caractere especial na posição 0 da CGRAM
  lcd.createChar(0, degreeSymbol);

  conectarWiFi();

    // Configura o fuso horário
    configTime(-3 * 3600, 0, "pool.ntp.org", "time.nist.gov");
    setenv("TZ", timezone, 1); // Define a variável de ambiente TZ
    tzset(); // Atualiza o fuso horário
}

void loop() {
  // Obtém temperatura
  sensors.requestTemperatures();
  temperatura = obterTemperatura();
  qualidade_agua = random(15, 20);
  float evaporacao = random(20,60);
  evaporacao = evaporacao/100;
  Serial.println(evaporacao);

  sendDataToAPI(1, temperatura, 16);
  sendDataToAPI(2, qualidade_agua, 16);
  sendDataToAPI(3, evaporacao, 16);

  evaporacao = random(20,60);
  evaporacao = evaporacao/100;
  qualidade_agua = random(15, 20);
  sendDataToAPI(1, temperatura, 17);
  sendDataToAPI(2, qualidade_agua, 17);
  sendDataToAPI(3, evaporacao, 17);

  evaporacao = random(20,60);
  evaporacao = evaporacao/100;
  qualidade_agua = random(15, 20);
  sendDataToAPI(1, temperatura, 23);
  sendDataToAPI(2, qualidade_agua, 23);
  sendDataToAPI(3, evaporacao, 23);


  exibirStatus();

  delay(10000);
}

void conectarWiFi() {
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("Conectado ao WiFi");
}

float obterTemperatura() {
  sensors.requestTemperatures();
  return sensors.getTempCByIndex(0);
}

String obterHoraString() {
  struct tm timeinfo;
  if (!getLocalTime(&timeinfo)) {
    Serial.println("Falha ao obter a hora");
    return "0000-00-00 00:00:00";
  }
  char timeString[25];
  strftime(timeString, sizeof(timeString), "%Y-%m-%d %H:%M:%S", &timeinfo);
  return String(timeString);
}

void exibirStatus() {
  if (WiFi.status() == WL_CONNECTED) {
    lcd.setCursor(0, 0);
    lcd.print("WiFi: OK");
    Serial.println("WiFi: Conectado");
  } else {
    lcd.setCursor(0, 0);
    lcd.print("WiFi: Erro");
    Serial.println("WiFi: Erro");
  }

  HTTPClient http;
  http.begin(api_url);
  int httpResponseCode = http.GET();
  if (httpResponseCode == 200) {
    lcd.setCursor(0, 1);
    lcd.print("API: OK");
    Serial.println("API: OK");
  } else {
    lcd.setCursor(0, 1);
    lcd.print("API: Erro");
    Serial.println("API: Erro");
  }
  http.end();

  delay(2000);
  lcd.clear();

  lcd.setCursor(0, 0);
  lcd.print("Temp ");
  lcd.setCursor(6, 0);
  lcd.print(temperatura);
  lcd.setCursor(12, 0);
  lcd.write(byte(0)); // Exibe o símbolo de grau
  lcd.print("C");
  Serial.print("Temperatura: ");
  Serial.print(temperatura);
  Serial.println(" ºC");

  lcd.setCursor(0, 1);
  lcd.print("Qualidade ");
  lcd.setCursor(10, 1);
  lcd.print(qualidade_agua);
  lcd.setCursor(13, 1);
  lcd.print("NTU");
  Serial.print("Qualidade da água: ");
  Serial.print(qualidade_agua);
  Serial.println(" NTU");

}



void sendDataToAPI(int tipo_sensor_id, float value, int tanque_id) {
  HTTPClient http;
  http.begin(api_url);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  String postData = "tipo_sensor_id=" + String(tipo_sensor_id) + "&valor=" + String(value) + "&data_leitura=" + obterHoraString() + "&tanque_id=" + String(tanque_id);
    Serial.println(postData);
  int httpResponseCode = http.POST(postData);
  if (httpResponseCode > 0) {
    Serial.print("Resposta da API: ");
    String payload = http.getString();
    Serial.println(payload);
  } else {
    Serial.print("Erro ao enviar dados para a API. Código de resposta: ");
    Serial.println(httpResponseCode);
  }
  http.end();
}


































#include <HTTPClient.h>
#include <WiFi.h>
#include <OneWire.h>
#include <DallasTemperature.h>
#include <Wire.h>
#include <hd44780.h>
#include <hd44780ioClass/hd44780_I2Cexp.h>
#include <EEPROM.h>
#include <GravityTDS.h>
#include "time.h"
#include "sys/time.h"

// Dados do WiFi
const char* ssid = "Be2G";
const char* password = "cenhahu3hu3";

// Configurações do Sensor de Temperatura
const int TEMPERATURE_SENSOR_PIN = 4;
OneWire oneWire(TEMPERATURE_SENSOR_PIN);
DallasTemperature sensors(&oneWire);

// Configurações do Sensor Ultrassônico
const int TRIG_PIN = 26;
const int ECHO_PIN = 25;

// Configurações do Sensor TDS Meter
const int TDS_PIN = 27;
GravityTDS gravityTds;

// Dados da API PHP
const char* api_url = "http://192.168.1.21/Neptune/SisNeptuneTCC/Backend/API/api.php";

// LCD
hd44780_I2Cexp lcd;

// Define o fuso horário para São Paulo
const char* timezone = "BRT-3BRST,M10.3.0/0,M2.3.0/0";

void setup() {
    Serial.begin(115200);
    sensors.begin();
    pinMode(TRIG_PIN, OUTPUT);
    pinMode(ECHO_PIN, INPUT);
    pinMode(TDS_PIN, INPUT);

    // Inicializa o LCD
    lcd.begin(16, 2);

    connectWiFi();

    // Configura o fuso horário
    configTime(-3 * 3600, 0, "pool.ntp.org", "time.nist.gov");
    setenv("TZ", timezone, 1); // Define a variável de ambiente TZ
    tzset(); // Atualiza o fuso horário
}

void loop() {
    float temperature = getTemperature();
    float distance = getDistance();
    float tdsValue = getTdsValue();

    sendDataToAPI(1, temperature);
    sendDataToAPI(2, distance);
    sendDataToAPI(3, tdsValue);

    displayStatus();

    delay(10 * 1000); // Aguarda 5 minutos para a próxima leitura
}

void connectWiFi() {
    WiFi.begin(ssid, password);
    while (WiFi.status() != WL_CONNECTED) {
        delay(500);
        Serial.print(".");
    }
    Serial.println("Conectado ao WiFi");
}

float getTemperature() {
    sensors.requestTemperatures();
    return sensors.getTempCByIndex(0);
}

float getDistance() {
    long duration;
    float distance;
    digitalWrite(TRIG_PIN, LOW);
    delayMicroseconds(2);
    digitalWrite(TRIG_PIN, HIGH);
    delayMicroseconds(10);
    digitalWrite(TRIG_PIN, LOW);
    duration = pulseIn(ECHO_PIN, HIGH);
    distance = duration * 0.034 / 2;
    return distance;
}

float getTdsValue() {
    return gravityTds.getTdsValue();
}

void sendDataToAPI(int sensor_id, float value) {
    HTTPClient http;
    http.begin(api_url);
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");

    String postData = "sensor_id=" + String(sensor_id) + "&valor=" + String(value) + "&data_leitura=" + getTimeString();
    int httpResponseCode = http.POST(postData);

    if (httpResponseCode > 0) {
        Serial.print("Resposta da API: ");
        Serial.println(httpResponseCode);
        String payload = http.getString();
        Serial.println("Resposta da API:");
        Serial.println(payload);
    } else {
        Serial.print("Erro ao enviar dados para a API. Código de resposta: ");
        Serial.println(httpResponseCode);
    }

    http.end();
}

void displayStatus() {
    if (WiFi.status() == WL_CONNECTED) {
        lcd.setCursor(0, 0);
        lcd.print("WiFi: OK");
    } else {
        lcd.setCursor(0, 0);
        lcd.print("WiFi: Erro");
    }

    HTTPClient http;
    http.begin(api_url);
    int httpResponseCode = http.GET();
    if (httpResponseCode == 200) {
        lcd.setCursor(0, 1);
        lcd.print("API: OK");
    } else {
        lcd.setCursor(0, 1);
        lcd.print("API: Erro");
    }

    http.end();
}

String getTimeString() {
    struct tm timeinfo;
    if (!getLocalTime(&timeinfo)) {
        Serial.println("Falha ao obter a hora");
        return "0000-00-00 00:00:00";
    }
    char timeString[25];
    strftime(timeString, sizeof(timeString), "%Y-%m-%d %H:%M:%S", &timeinfo);
    return String(timeString);
}
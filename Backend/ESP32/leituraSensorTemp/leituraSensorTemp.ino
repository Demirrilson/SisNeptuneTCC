#include <HTTPClient.h>
#include <WiFi.h>
#include <OneWire.h>
#include <DallasTemperature.h>
#include <Wire.h>
#include <hd44780.h>
#include <hd44780ioClass/hd44780_I2Cexp.h>
#include <TimeLib.h> // Incluindo a biblioteca TimeLib

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

// Dados da API PHP
const char* api_url = "http://192.168.1.21/Neptune/SisNeptuneTCC/Backend/API/api.php";

// LCD
hd44780_I2Cexp lcd; // Instanciação do objeto lcd

void setup() {
    Serial.begin(115200);
    sensors.begin();
    pinMode(TRIG_PIN, OUTPUT);
    pinMode(ECHO_PIN, INPUT);
    pinMode(TDS_PIN, INPUT);

    connectWiFi();

    // Inicialização do LCD
    lcd.begin(16, 2);

    // Configuração da TimeLib
    configTime(0, 0, "pool.ntp.org");
}

void loop() {
    float temperature = getTemperature();
    float distance = getDistance();
    float tdsValue = getTDS();

    sendDataToAPI(1, temperature);
    sendDataToAPI(2, distance);
    sendDataToAPI(3, tdsValue);

    displayStatus();

    delay(10 * 1000); // Aguardar 5 minutos para a próxima leitura
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
    distance = duration * 0.01715;
    return distance;
}

float getTDS() {
    return analogRead(TDS_PIN);
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
    time_t now = time(nullptr);
    struct tm timeinfo;
    localtime_r(&now, &timeinfo);

    char timeString[25];
    strftime(timeString, sizeof(timeString), "%Y-%m-%d %H:%M:%S", &timeinfo);
    return String(timeString);
}


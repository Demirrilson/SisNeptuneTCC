#include <HTTPClient.h>
#include <WiFi.h>
#include <OneWire.h>
#include <DallasTemperature.h>
#include <time.h>

// Dados do WiFi
const char* ssid = "Be2G";
const char* password = "cenhahu3hu3";

// Configurações do Sensor
const int oneWireBus = 4;
OneWire oneWire(oneWireBus);
DallasTemperature sensors(&oneWire);

// Dados da API PHP
const char* api_url = "http://192.168.1.21/Neptune/SisNeptuneTCC/Backend/API/api.php";

// Configuração do NTP
// Configuração do NTP para São Paulo, Brasil
const char* ntpServer = "pool.ntp.org";
const long  gmtOffset_sec = -3 * 3600; // GMT offset de 3 horas (em segundos) para São Paulo, Brasil
const int   daylightOffset_sec = 0;    // São Paulo não está em horário de verão

void setup() {
    Serial.begin(115200);
    sensors.begin();
    WiFi.begin(ssid, password);

    while (WiFi.status() != WL_CONNECTED) {
        delay(500);
        Serial.print(".");
    }
    Serial.println("Conectado ao WiFi");

    // Configurar a sincronização de tempo
    configTime(gmtOffset_sec, daylightOffset_sec, ntpServer);

    // Esperar pela sincronização de tempo
    Serial.println("Esperando pela sincronização de tempo...");
    while (!time(nullptr)) {
        delay(1000);
    }
    Serial.println("Tempo sincronizado");
}

void loop() {
    sensors.requestTemperatures();
    float temperature = sensors.getTempCByIndex(0);

    // Obter data e hora atual
    time_t now = time(nullptr);
    struct tm *timeinfo = localtime(&now);
    char data_leitura[20];
    strftime(data_leitura, sizeof(data_leitura), "%Y-%m-%d %H:%M:%S", timeinfo);

    // Enviar dados para a API PHP
    HTTPClient http;
    http.begin(api_url);
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    String postData = "data_leitura=" + String(data_leitura) + "&valor=" + String(temperature);

    Serial.print("Enviando dados para a API: ");
    Serial.println(postData);

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

    delay(10000); // Aguardar 10 segundos para a próxima leitura
}


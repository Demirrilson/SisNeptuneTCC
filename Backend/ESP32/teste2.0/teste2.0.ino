#include <WiFi.h>
#include <OneWire.h>
#include <DallasTemperature.h>
#include <HTTPClient.h>

// Dados do WiFi
const char* ssid = "Be2G";
const char* password = "cenhahu3hu3";

// Configurações do Sensor
const int oneWireBus = 4;
OneWire oneWire(oneWireBus);
DallasTemperature sensors(&oneWire);

// Configurações do LED
const int LED_PIN = 2;

void setup() {
  pinMode(LED_PIN, OUTPUT);
  Serial.begin(115200);
  sensors.begin();
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    digitalWrite(LED_PIN, !digitalRead(LED_PIN)); // Piscar LED durante a tentativa de conexão
  }
  digitalWrite(LED_PIN, HIGH); // Manter LED ligado quando conectado

  Serial.println("Conectado ao WiFi");
}

void loop() {
  sensors.requestTemperatures();
  float temperature = sensors.getTempCByIndex(0);

  Serial.print("Temperatura: ");
  Serial.println(temperature);

  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    http.begin("http://localhost/api.php"); // Endereço da sua API PHP local
    http.addHeader("Content-Type", "application/json");

    String jsonData = "{\"data_litura\":\"2023-04-17 12:34:56\", \"valor\":" + String(temperature) + "}";
    int httpResponseCode = http.POST(jsonData);

    if (httpResponseCode > 0) {
      String response = http.getString();
      Serial.println("Dados enviados com sucesso: " + response);
    } else {
      Serial.print("Erro no envio de dados: ");
      Serial.println(httpResponseCode);
    }

    http.end();
  }

  delay(10000); // Aguardar 10 segundos para a próxima leitura
}

#include <WiFi.h>
#include <HTTPClient.h>
#include <OneWire.h>
#include <DallasTemperature.h>
#include <time.h>

// Configurações da rede WiFi
const char* ssid = "Be2G";
const char* password = "cenhahu3hu3";

// Configurações do sensor DS18B20
#define ONE_WIRE_BUS 4
OneWire oneWire(ONE_WIRE_BUS);
DallasTemperature sensors(&oneWire);

// Configurações do sensor de qualidade de água
#define WATER_QUALITY_PIN 5

// Servidor API
const char* serverName = "http://seu_api_gateway_url.com/data";

void setup() {
  Serial.begin(115200);
  // Iniciar os sensores
  sensors.begin();
  pinMode(WATER_QUALITY_PIN, INPUT);

  // Conectar ao WiFi
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("Conectado à rede WiFi");

  // Iniciar NTP
  configTime(0, 0, "pool.ntp.org", "time.nist.gov");
  Serial.println("Aguardando sincronização de tempo");
  struct tm timeinfo;
  while (!getLocalTime(&timeinfo)) {
    Serial.print(".");
    delay(1000);
  }
  Serial.println("Tempo sincronizado");
}

void loop() {
  sensors.requestTemperatures();  // Solicita leitura de temperatura
  float temperatureC = sensors.getTempCByIndex(0);  // Lê a temperatura
  int waterQuality = digitalRead(WATER_QUALITY_PIN);  // Lê a qualidade da água

  struct tm timeinfo;
  if(!getLocalTime(&timeinfo)){
    Serial.println("Falha ao obter o tempo");
    return;
  }
  char dataHora[64];
  strftime(dataHora, sizeof(dataHora), "%Y-%m-%d %H:%M:%S", &timeinfo);
  String jsonData = "{\"temperatura\": " + String(temperatureC) + 
                    ", \"qualidade_agua\": " + String(waterQuality) +
                    ", \"data_hora\": \"" + dataHora + "\"}";

  // Envia dados
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    http.begin(serverName);
    http.addHeader("Content-Type", "application/json");
    int httpResponseCode = http.POST(jsonData);

    if (httpResponseCode > 0) {
      String response = http.getString();
      Serial.println("Dados enviados com sucesso: " + response);
    } else {
      Serial.print("Erro no envio de dados: ");
      Serial.println(httpResponseCode);
    }
    http.end();
  } else {
    Serial.println("Erro de conexão WiFi");
  }
  delay(10000); // Delay de 10 segundos antes da próxima leitura
}
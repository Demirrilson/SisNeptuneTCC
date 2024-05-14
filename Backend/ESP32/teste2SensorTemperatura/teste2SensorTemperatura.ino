#include <OneWire.h>
#include <DallasTemperature.h>
#include <WiFi.h> // Inclui a biblioteca WiFi para ESP32
#include <time.h>

// Pin where the DS18B20 is connected
const int oneWireBus = 4;

// Setup a oneWire instance to communicate with any OneWire devices
OneWire oneWire(oneWireBus);

// Pass our oneWire reference to Dallas Temperature sensor 
DallasTemperature sensors(&oneWire);

void setup() {
  Serial.begin(115200);  // Start serial communication at 115200 bauds
  sensors.begin();       // Start up the library for DS18B20
  
  // Connect to WiFi network (optional, only if you want NTP synchronization)
  WiFi.begin("Be2G", "cenhahu3hu3"); // Substitua "yourSSID" e "yourPASSWORD" pelos seus dados de rede
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("Connected to WiFi network");

  // Initialize NTP
  configTime(0, 3600, "pool.ntp.org", "time.nist.gov");  // GMT offset and NTP server
  Serial.println("\nWaiting for time");
  while (!time(nullptr)) {
    Serial.print(".");
    delay(1000);
  }
  Serial.println("\nTime synchronized");
}

void loop() {
  sensors.requestTemperatures();  // Send the command to get temperatures
  float temperatureC = sensors.getTempCByIndex(0);  // Read temperature in Celsius
  
  // Get current time
  struct tm timeinfo;
  if (!getLocalTime(&timeinfo)) {
    Serial.println("Failed to obtain time");
    return;
  }
  
  // Print temperature with date and time
  Serial.printf("Current temperature: %.2f°C, Time: %04d-%02d-%02d %02d:%02d:%02d\n",
                temperatureC,
                timeinfo.tm_year + 1900, timeinfo.tm_mon +1, timeinfo.tm_mday,
                timeinfo.tm_hour -4, timeinfo.tm_min, timeinfo.tm_sec);
  delay(1000);  // Wait for 10 seconds before the next reading
}


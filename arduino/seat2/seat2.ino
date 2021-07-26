#include <SoftwareSerial.h>

int sensor = 7; //센서의 signal 선을 7번에 연결
int echo = 8; // echo를 8번에 연결
int trig = 12; //trig를 12번에 연결

float heat2;
float cycletime;
float distance2;

SoftwareSerial mySerial(2, 3); //TX, RX

String ssid = "Your WIFI router name"; //와이파이 라우터 이름 입력
String PASSWORD = "Your WIFI router password"; //와이파이 라우터 비밀번호
String host = "000.000.00.000"; //공용 IP 주소

void connectWifi(){
  String join = "AT+CWJAP=\""+ssid+"\",\""+PASSWORD+"\"";
  
  Serial.println("Connect Wifi...");
  mySerial.println(join);
  delay(10000);
  
  if(mySerial.find("OK")){
    Serial.print("WIFI connect\n");
  }
  
  else{
    Serial.println("connect timeout");
  }
  delay(1000);
}


void httpclient(String char_input){
  delay(100);
  Serial.println("connect TCP...");
  mySerial.println("AT+CIPSTART=\"TCP\",\""+host+"\",8080");
  delay(500);
  
  if(Serial.find("ERROR")) return;
  
  Serial.println("Send data...");
  String url = char_input;
  String cmd = "GET /process2.php?heat="+url+" HTTP/1.0\r\n\r\n";
  mySerial.print("AT+CIPSEND=");
  mySerial.println(cmd.length());
  Serial.print("AT+CIPSEND=");
  Serial.println(cmd.length());
  
  if(mySerial.find(">")){
    Serial.print(">");
  }
  else{
    mySerial.println("AT+CIPCLOSE");
    Serial.println("connect timeout");
    delay(1000); return;
  }
  delay(500);
  
  mySerial.println(cmd);
  Serial.println(cmd);
  delay(100);
  if(Serial.find("ERROR")) return;
  mySerial.println("AT+CIPCLOSE");
  delay(100);
}


void setup(){
  pinMode(7, INPUT);
  pinMode(trig, OUTPUT);
  pinMode(echo, INPUT);
  
  Serial.begin(9600);
  mySerial.begin(9600);
  
  connectWifi();
  delay(500);
}

void loop(){
  int heat2 = digitalRead(sensor);
  
  if(heat2 == 1){
    Serial.println("감지 함");
  }
  else{
    Serial.println("감지 못 함");
  }
  
  digitalWrite(trig, HIGH);
  delay(10);
  digitalWrite(trig, LOW);
  
  cycletime = pulseIn(echo, HIGH);
  
  distance2 = ((340 * cycletime) / 10000) / 2;
  
  Serial.print("distance2:");
  Serial.print(distance2);
  Serial.println("cm");
  
  String str_output = String(heat2)+"&distance2="+String(distance2);
  delay(1000);
  httpclient(str_output);
  delay(1000);
  //Serial.find("IPD");
  while(mySerial.available()){
    char response = mySerial.read();
    Serial.write(response);
    if(response=='\r')Serial.print('\n');
  }
  Serial.println("\n========================================\n");
  delay(60000);
}
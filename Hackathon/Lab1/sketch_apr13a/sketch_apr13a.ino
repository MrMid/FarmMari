#include <Sodaq_RN2483.h>


#define debugSerial SerialUSB
#define loraSerial Serial2

// USE YOUR OWN KEYS!
const uint8_t devAddr[4] =
{
  0x00, 0x1E, 0xD2, 0x00
};

// USE YOUR OWN KEYS!
const uint8_t appSKey[16] =
{
  0x2b, 0x7c, 0x40, 0xa2, 0x84, 0xa9, 0x91, 0xf1, 0x95, 0x8f, 0xaf, 0xbf, 0x5e, 0x76, 0x9c, 0x00
};

// USE YOUR OWN KEYS!
const uint8_t nwkSKey[16] =
{
  0x2b, 0x7c, 0x40, 0xa2, 0x84, 0xa9, 0x91, 0xf1, 0x95, 0x8f, 0xaf, 0xbf, 0x5e, 0x76, 0x9c, 0x00
};

// Some complete random hex
uint8_t testPayload[] =
{
  0x04, 0xC5, 0xFC, 0x01, 0x60, 0x96, 0xA0
};

void setup()
{
  while ((!debugSerial) && (millis() < 10000));
  
  debugSerial.begin(57600);
  loraSerial.begin(LoRaBee.getDefaultBaudRate());

  LoRaBee.setDiag(debugSerial); // optional
  if (LoRaBee.initABP(loraSerial, devAddr, appSKey, nwkSKey, false))
  {
    debugSerial.println("Connection to the network was successful.");
  }
  else
  {
    debugSerial.println("Connection to the network failed!");
  }
}

void loop()
{
  debugSerial.println("Sleeping for 5 seconds before starting sending out test packets.");
  for (uint8_t i = 5; i > 0; i--)
  {
    debugSerial.println(i);
    delay(1000);
  }

  // send 10 packets, with at least a 5 seconds delay after each transmission (more seconds if the device is busy)
  uint8_t i = 10;
  while (i > 0)
  {
    switch (LoRaBee.send(1, testPayload, 7))
    {
    case NoError:
      debugSerial.println("Successful transmission.");
      i--;
      break;
    case NoResponse:
      debugSerial.println("There was no response from the device.");
      break;
    case Timeout:
      debugSerial.println("Connection timed-out. Check your serial connection to the device! Sleeping for 20sec.");
      delay(20000);
      break;
    case PayloadSizeError:
      debugSerial.println("The size of the payload is greater than allowed. Transmission failed!");
      break;
    case InternalError:
      debugSerial.println("Oh No! This shouldn't happen. Something is really wrong! Try restarting the device!\r\nThe program will now halt.");
      while (1) {};
      break;
    case Busy:
      debugSerial.println("The device is busy. Sleeping for 10 extra seconds.");
      delay(10000);
      break;
    case NetworkFatalError:
      debugSerial.println("There is a non-recoverable error with the network connection. You should re-connect.\r\nThe program will now halt.");
      while (1) {};
      break;
    case NotConnected:
      debugSerial.println("The device is not connected to the network. Please connect to the network before attempting to send data.\r\nThe program will now halt.");
      while (1) {};
      break;
    case NoAcknowledgment:
      debugSerial.println("There was no acknowledgment sent back!");
      break;
    default:
      break;
    }
    delay(60000);
  }
} 

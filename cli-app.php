<?php
// include class
require('phpMQTT.php');


// set configuration values
$config = array(
  'org_id' => '7j2pz2',
  'port' => '1883',
  'app_id' => 'IOTapp4hjl',
  'iotf_api_key' => 'a-7j2pz2-vltvsxgbv7',
  'iotf_api_secret' => 'PpS95MB*MQzRi-*SW6',
  'device_id' => 'Android01'
);


$config['server'] = $config['org_id'] . '.messaging.internetofthings.ibmcloud.com';
$config['client_id'] = 'a:' . $config['org_id'] . ':' . $config['app_id'];
$location = array();

// initialize client
$mqtt = new phpMQTT($config['server'], $config['port'], $config['client_id']); 
$mqtt->debug = false;

// connect to broker
if(!$mqtt->connect(true, null, $config['iotf_api_key'], $config['iotf_api_secret'])){
  echo 'ERROR: Could not connect to IoT cloud';
	exit();
} 

// subscribe to topics
$topics['iot-2/type/+/id/' . $config['device_id'] . '/evt/accel/fmt/json'] = 
  array('qos' => 0, 'function' => 'getLocation');
$mqtt->subscribe($topics, 0);

// process messages
while ($mqtt->proc(true)) { 
}

// disconnect
$mqtt->close();

function getLocation($topic, $msg) {
  $json = json_decode($msg);
  echo date('d-m-y h:i:s') . " Device located at (51.5081, 0.1281)" . PHP_EOL;
}
?>
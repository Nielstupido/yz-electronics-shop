<?php

require_once('vendor/autoload.php');
$client = new \GuzzleHttp\Client();



function clean($string){
  $string = str_replace(' ', '', $string);
  $string = str_replace('.', '', $string);
  return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
}



try {
  
  $value = $_POST['amount'];
  $amount =  clean($value);
  $response = $client->request('POST', 'https://api.paymongo.com/v1/sources', [

    'body' => '{"data":{"attributes":{"amount":'.$amount.',"redirect":{"success":"http://localhost/paymongo/success.php","failed":"http://localhost/paymongo/failed.php"},"type":"gcash","currency":"PHP"}}}',
  
    'headers' => [
  
      'Accept' => 'application/json',
        //Your authorization key here
      'Authorization' => '',
  
      'Content-Type' => 'application/json',
  
    ],
  
  ]);
  
  
  $data = json_decode($response->getBody() , true); // returns an array
  
  $redirect = $data['data']['attributes']['redirect']['checkout_url'];
  echo "Redirecting in 3 seconds..";
  header('Refresh: 3;URL='.$redirect);


} catch (GuzzleHttp\Exception\ClientException $e) {
    
    $response = $e->getResponse();
    $responseBodyAsString = $response->getBody()->getContents();

    $error = json_decode($responseBodyAsString, true);

    print_r($error['errors'][0]['detail']);

}


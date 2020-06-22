<?php
session_start();
error_reporting(-1);
ini_set('display_errors', 'On');
 
if (!isset($_GET['code'])) {
 $authUrl = "https://login.microsoftonline.com/common/oauth2/authorize?";
 $authUrl .= "client_id=d88d00ad-a71b-45fd-b760-e38446d1bb2a";
 $authUrl .= "&response_type=code";
 $authUrl .= "&https%3A%2F%2Fpenjana-ntep.herokuapp.com%2Fshow.php";
 $authUrl .= "&response_mode=query";
 $authUrl .= "&resource=https%3A%2F%2Fmanagement.azure.com%2F";
 //$authUrl .= "&state=12345";
 
 header('Location: '.$authUrl);
 exit;
 
} else {
 
 $accesscode = $_GET['code'];
 
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL,"https://login.microsoftonline.com/common/oauth2/token");
 curl_setopt($ch, CURLOPT_POST, 1);
 $client_id = "d88d00ad-a71b-45fd-b760-e38446d1bb2a";
 $client_secret = "l0Nhyr1J9N1~lB.mvn5TRnecO2I4.a._Up";
 curl_setopt($ch, CURLOPT_POSTFIELDS,
 "grant_type=authorization_code&client_id=".$client_id."&redirect_uri=https%3A%2F%2Fpenjana-ntep.herokuapp.com%2Fshow.php&resource=https%3A%2F%2Fmanagement.azure.com%2F&&code=".$accesscode."&client_secret=".urlencode($client_secret));
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 $server_output = curl_exec ($ch);
 curl_close ($ch); 
 $jsonoutput = json_decode($server_output, true);
 
 $bearertoken = $jsonoutput['access_token'];
 $url = "https://management.azure.com/subscriptions/?api-version=2015-01-01";
 $ch = curl_init($url);
 $User_Agent = 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31';
 $request_headers = array();
 $request_headers[] = 'User-Agent: '. $User_Agent;
 $request_headers[] = 'Accept: application/json';
 $request_headers[] = 'Authorization: Bearer '. $bearertoken;
 curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
 $result = curl_exec($ch);
 curl_close($ch);
 echo $result;
  
}
 
?>

<?php 
//https://notify-bot.line.me/my/ addtoken
//http://meyerweb.com/eric/tools/dencoder/
$chOne = curl_init(); 
function senline($userid){
global $chOne;
curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
// SSL USE 
curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
//POST 
curl_setopt( $chOne, CURLOPT_POST, 1); 
// Message 
$text1=rawurldecode($userid);
curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$text1); 
curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1); 
//ADD header array   sVHTrzoUouaiRQZGMTbcTO4SGudsjFzuOvX0vvWm2f3
$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer xiG3zAzb6Td2DBgQsScZurNVYllaCiIU+oN+LIrPX5FlwjUXWKPQjWc1LhrKNvDqyyCLEsLuXofHNZPaDPS9dP/fWhyxTSGs2rAH5i9PkgrmnVnmkvk3uXCh6T0LWL/aNQnE1yK8+fUhevcPDzrhmAdB04t89/1O/w1cDnyilFU=', ); 
curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
//RETURN 
curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
$result = curl_exec( $chOne ); 
//Check error 
/*
if(curl_error($chOne)) { echo 'error:' . curl_error($chOne); } 
else { $result_ = json_decode($result, true); 
echo "status : ".$result_['status']; echo "message : ". $result_['message']; } 
*/
//Close connect 
curl_close( $chOne ); 
}
senline('ทดสอบ');
?>

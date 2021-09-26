<?php
 
 
$API_URL = 'https://api.line.me/v2/bot/message/reply';
$ACCESS_TOKEN = 'q3z1jYmFhn2A2Ee2fGiAdRLaP5PEbqvRtuFaYm/leVoFJ1JtZggY0xuMTjDMLsjj96Foc0dZY+l977JRm9ysL2vc/DjWrMqn7nz33FLPTI8oC5MaWBv6ODbMEP9oG3L/8O6KRekJxX1mSKqwlzF9cgdB04t89/1O/w1cDnyilFU='; // Access Token ค่าที่เราสร้างขึ้น
$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array

if ( sizeof($request_array['events']) > 0 )
{

 foreach ($request_array['events'] as $event)
 {
  $reply_message = '';
  $reply_token = $event['replyToken'];

  if ( $event['type'] == 'message' ) 
  {
   if( $event['message']['type'] == 'text' )
   {
    $text = $event['message']['text'];
    $reply_message = 'ระบบ  ('.$text.') ของs ';
   }
   else
    $reply_message = 'ระบบได้รับaa '.ucfirst($event['message']['type']).' ของคุณแล้ว';
  
  }
  else
   $reply_message = 'ระบบได้รับ Event '.ucfirst($event['type']).' ของคุณแล้ว';
 
  if( strlen($reply_message) > 0 )
  {
   //$reply_message = iconv("tis-620","utf-8",$reply_message);
   
      
   $data = [
    'replyToken' => $reply_token, 
     'messages' => [['type' => 'image', 'originalContentUrl' =>'https://www.chomsurang.ac.th/chomlearning/head.png',
                    'previewImageUrl' =>'https://dummyimage.com/1024x1024/f598f5/fff.jpg' ]]
   ];
   
    $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);
 

   $send_result = send_reply_message($API_URL, $POST_HEADER, $post_body);
   echo "Result: ".$send_result."\r\n";
  }
 }
}

echo "OK";

function send_reply_message($url, $post_header, $post_body)
{
 $ch = curl_init($url);
 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
 $result = curl_exec($ch);
 curl_close($ch);

 return $result;
}

?>
*/ 

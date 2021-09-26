<?php
// $photo=$_GET["photo"];
/*-------------line noti----------------------*/
$line_api = 'https://api.line.me/v2/bot/message/reply'; //'https://notify-api.line.me/api/notify';
    $access_token ='q3z1jYmFhn2A2Ee2fGiAdRLaP5PEbqvRtuFaYm/leVoFJ1JtZggY0xuMTjDMLsjj96Foc0dZY+l977JRm9ysL2vc/DjWrMqn7nz33FLPTI8oC5MaWBv6ODbMEP9oG3L/8O6KRekJxX1mSKqwlzF9cgdB04t89/1O/w1cDnyilFU=' ;

    $message = 'test send photo';    //text max 1,000 charecter
   // $image_thumbnail_url = 'http://localhost/line/send-photo/photo-thumb.jpg';  // max size 240x240px JPEG
  //  $image_fullsize_url = 'https://uts.ac.th/lex/gpa/picteacher/0777d5c17d4066b82ab86dff8a46af6f.jpg' //$photo; //max size 1024x1024px JPEG
   
     $image_thumbnail_url = 'https://dummyimage.com/1024x1024/f598f5/fff.jpg';  // max size 240x240px JPEG
    $image_fullsize_url = 'https://dummyimage.com/1024x1024/844334/fff.jpg'; //max size 1024x1024px JPEG
    $imageFile = 'copy/240.jpg';

        
   // $imageFile = 'copy/240.jpg';
    $sticker_package_id = '';  // Package ID sticker
    $sticker_id = '';    // ID sticker

    $message_data = array(
  'imageThumbnail' => $image_thumbnail_url,
  'imageFullsize' => $image_fullsize_url,
  'message' => $message,
  'imageFile' => $imageFile,
  'stickerPackageId' => $sticker_package_id,
  'stickerId' => $sticker_id
    );
   $data = [
    'replyToken' => $access_token,
    'messages' => [['type' => 'text', 'text' => $message]]
   ];
    

    
   $message_data = json_encode($data, JSON_UNESCAPED_UNICODE);

    $result = send_notify_message($line_api, $access_token, $message_data);

echo '<pre>';
     print_r($result);
     echo '</pre>';
/*-------------line noti----------------------*/



function send_notify_message($line_api, $access_token, $message_data){
   $headers = array('Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$access_token );

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $line_api);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $message_data);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $result = curl_exec($ch);
   // Check Error
   if(curl_error($ch))
   {
      $return_array = array( 'status' => '000: send fail', 'message' => curl_error($ch) );
   }
   else
   {
      $return_array = json_decode($result, true);
   }
   curl_close($ch);
return $return_array;
}

?>
/*
 

$token = "q3z1jYmFhn2A2Ee2fGiAdRLaP5PEbqvRtuFaYm/leVoFJ1JtZggY0xuMTjDMLsjj96Foc0dZY+l977JRm9ysL2vc/DjWrMqn7nz33FLPTI8oC5MaWBv6ODbMEP9oG3L/8O6KRekJxX1mSKqwlzF9cgdB04t89/1O/w1cDnyilFU=" ; // LINE Token
//Message
$mymessage = "เรื่อง: ทดสอบส่งข้อความ \n"; //Set new line with '\n'
$mymessage .= "จาก: ข้อความจากแมว \n";
$mymessage .= "รายละเอียด: แมวหิวแล้วจ้า";
$imageFile = new CURLFILE('https://uts.ac.th/lex/gpa/picteacher/0777d5c17d4066b82ab86dff8a46af6f.jpg'); // Local Image file Path
$sticker_package_id = '2';  // Package ID sticker
$sticker_id = '34';    // ID sticker
  $data = array (
    'message' => $mymessage,
    'imageFile' => $imageFile,
    'stickerPackageId' => $sticker_package_id,
    'stickerId' => $sticker_id
  );

 

  $chOne = curl_init();
  curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
  curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt( $chOne, CURLOPT_POST, 1);
  curl_setopt( $chOne, CURLOPT_POSTFIELDS, $data);
  curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);
  $headers = array( 'Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$token, );
  curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
  curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec( $chOne );
  //Check error
  if(curl_error($chOne)) { echo 'error:' . curl_error($chOne); }
  else { $result_ = json_decode($result, true);
  echo "status : ".$result_['status']; echo "message : ". $result_['message']; 
  }
  //Close connection
  curl_close( $chOne );

?> 

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
    $reply_message = 'ระบบได้รับข้อความ ('.$text.') ของคุณแล้ว';
   }
   else
    $reply_message = 'ระบบได้รับ '.ucfirst($event['message']['type']).' ของคุณแล้ว';
  
  }
  else
   $reply_message = 'ระบบได้รับ Event '.ucfirst($event['type']).' ของคุณแล้ว';
 
  if( strlen($reply_message) > 0 )
  {
   //$reply_message = iconv("tis-620","utf-8",$reply_message);
   $data = [
    'replyToken' => $reply_token,
    'messages' => [['type' => 'text', 'text' => $reply_message]]
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

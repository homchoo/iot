<?php
// $photo=$_GET["photo"];
/*-------------line noti----------------------
 //    $message = 'test send photo';    //text max 1,000 charecter
   // $image_thumbnail_url = 'http://localhost/line/send-photo/photo-thumb.jpg';  // max size 240x240px JPEG
  //  $image_fullsize_url = 'https://uts.ac.th/lex/gpa/picteacher/0777d5c17d4066b82ab86dff8a46af6f.jpg' //$photo; //max size 1024x1024px JPEG
   
  //   $image_thumbnail_url = 'https://dummyimage.com/1024x1024/f598f5/fff.jpg';  // max size 240x240px JPEG
 //   $image_fullsize_url = 'https://dummyimage.com/1024x1024/844334/fff.jpg'; //max size 1024x1024px JPEG
 //   $imageFile = 'copy/240.jpg';

        
   // $imageFile = 'copy/240.jpg';
 //   $sticker_package_id = '';  // Package ID sticker
//    $sticker_id = '';    // ID sticker

//    $message_data = array(
  'imageThumbnail' => $image_thumbnail_url,
  'imageFullsize' => $image_fullsize_url,
  'message' => $message,
  'imageFile' => $imageFile,
  'stickerPackageId' => $sticker_package_id,
  'stickerId' => $sticker_id
    );
    */
 
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
     'messages' => [['type' => 'image', 'originalContentUrl' =>'https://uts.ac.th/lex/gpa/picteacher/9bf31c7ff062936a96d3c8bd1f8f2ff3.jpg',
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

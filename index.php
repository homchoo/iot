
<?php
$access_token = 'xiG3zAzb6Td2DBgQsScZurNVYllaCiIU+oN+LIrPX5FlwjUXWKPQjWc1LhrKNvDqyyCLEsLuXofHNZPaDPS9dP/fWhyxTSGs2rAH5i9PkgrmnVnmkvk3uXCh6T0LWL/aNQnE1yK8+fUhevcPDzrhmAdB04t89/1O/w1cDnyilFU=';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

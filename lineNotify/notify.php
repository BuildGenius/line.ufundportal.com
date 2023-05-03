<?php
// tb8GXWSKHARRcdCIFJjbpaqt3s72suO29oZDLixhJfI
// RqULZ7a2f8Ib415MgHeW9z2zirPcaMWosscXrEfwL6P   test
// $token = "tb8GXWSKHARRcdCIFJjbpaqt3s72suO29oZDLixhJfI" ; // LINE Token
$token = "lm9CU5YuzNwCCQRGayS65MEkIsaeYA7wAr2TnORFA1e";
//Message
$mymessage = "Receipt รันแล้วนะ\n"; //Set new line with '\n'
$sticker_package_id = '6136';  // Package ID sticker
$sticker_id = '10551398';    // ID sticker
  $data = array (
    'message' => $mymessage,
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
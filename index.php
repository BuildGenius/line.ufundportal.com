<?php
$arr_text = array();
    
if(isset($_GET['app_num'])) { $app_num = $_GET['app_num'];  } else{ $app_num='';}
if(isset($_GET['name'])) { $name = $_GET['name'];  } else{ $name='';}
if(isset($_GET['barch_id'])) { $barch_type = $_GET['barch_id'];  } else{ $barch_type='';}

// ciIlvPiVefLV6csU07zzPwrAttPA7un3Mz6YGmc9VnL
if(isset($_GET['ck01'])) { $ck01 = $_GET['ck01'];  } else{ $ck01='';}//ชื่อ - นามสกุลผู้เช่าซื้อ
if(isset($_GET['rm01'])) 
    { $rm01 = $_GET['rm01'];
      } 
else{ $rm01='';}
if($ck01 == 'PASS')
{    
    $text01 = 'ชื่อ - นามสกุล :'.$name;
    array_push($arr_text,$text01);}
    else{
    $text01 = 'ชื่อ - นามสกุล : NOT PASS ('.$rm01.')';
    array_push($arr_text,$text01);
}

if(isset($_GET['tax'])) { $tax = $_GET['tax'];  } else{ $tax='';}
if(isset($_GET['ck02'])) { $ck02 = $_GET['ck02'];  } else{ $ck02='';}
//เลขบัตรประชาชน
if(isset($_GET['rm02'])) { $rm02 = $_GET['rm02'];  } else{ $rm02='';}
if($ck02 == 'PASS'){
    $text02 = 'เลขบัตรประชาชน :'.$tax;
    array_push($arr_text,$text02);
}else{
    $text02 = 'เลขบัตรประชาชน : NOT PASS ('.$rm02.')';
    array_push($arr_text,$text02);
}


if(isset($_GET['birthday'])) { $birthday = $_GET['birthday'];  } else{ $birthday='';}
if(isset($_GET['ck03'])) { $ck03 = $_GET['ck03'];  } else{ $ck03='';}
if(isset($_GET['rm03'])) { $rm03 = $_GET['rm03'];  } else{ $rm03='';}
if($ck03 == 'PASS'){

}else{
    $text03 = 'วันเกิด : NOT PASS ('.$rm03.')';
    array_push($arr_text,$text03);
}

if(isset($_GET['phone'])) { $phone = $_GET['phone'];  } else{ $phone='';}
if(isset($_GET['ck05'])) { $ck05 = $_GET['ck05'];  } else{ $ck05='';}
if(isset($_GET['rm05'])) { $rm05 = $_GET['rm05'];  } else{ $rm05='';}
if($ck05 == 'PASS'){
    $text05 = 'เบอร์โทรศัพท์ : '. $phone ;
    array_push($arr_text,$text05);
}else{
    $text05 = 'เบอร์โทรศัพท์ : '. $phone .' NOT PASS ('.$rm05.')';
    array_push($arr_text,$text05);
}

if(isset($_GET['social'])) { $social = $_GET['social'];  } else{ $social='';}
if(isset($_GET['ck06'])) { $ck06 = $_GET['ck06'];  } else{ $ck06='';}
if(isset($_GET['rm06'])) { $rm06 = $_GET['rm06'];  } else{ $rm06='';}
if($ck06 == 'PASS'){}else{
    $text06 = 'Facebook / IG name : NOT PASS ('.$rm06.')';
    array_push($arr_text,$text06);
}


if(isset($_GET['ck04'])) { $ck04 = $_GET['ck04'];  } else{ $ck04='';}
if(isset($_GET['rm04'])) { $rm04 = $_GET['rm04'];  } else{ $rm04='';}
if($ck04 == 'PASS'){}else{
    $text04 = 'ข้อมูลที่อยู่ : NOT PASS ('.$rm04.')';
    array_push($arr_text,$text04);
}

if(isset($_GET['std_id'])) { $std_id = $_GET['std_id'];  } else{ $std_id='';}
if(isset($_GET['ck07'])) { $ck07 = $_GET['ck07'];  } else{ $ck07='';}
if(isset($_GET['rm07'])) { $rm07 = $_GET['rm07'];  } else{ $rm07='';}
if($ck07 == 'PASS'){}else{
    $text07 = 'รหัสนักศึกษา : NOT PASS ('.$rm07.')';
    array_push($arr_text,$text07);
}

if(isset($_GET['university'])) { $university = $_GET['university'];  } else{ $university='';}
if(isset($_GET['ck08'])) { $ck08 = $_GET['ck08'];  } else{ $ck08='';}
if(isset($_GET['rm08'])) { $rm08 = $_GET['rm08'];  } else{ $rm08='';}
if($ck08 == 'PASS'){}else{
    $text08 = 'ชื่อมหาวิทยาลัย : NOT PASS ('.$rm08.')';
    array_push($arr_text,$text08);
}
if(isset($_GET['faculty'])) { $faculty = $_GET['faculty'];  } else{ $faculty='';}
if(isset($_GET['ck10'])) { $ck10 = $_GET['ck10'];  } else{ $ck10='';}
if(isset($_GET['rm10'])) { $rm10 = $_GET['rm10'];  } else{ $rm10='';}
if($ck10 == 'PASS'){}else{
    $text10 = 'คณะ : NOT PASS ('.$rm10.')';
    array_push($arr_text,$text10);
}


if(isset($_GET['level'])) { $level = $_GET['level'];  } else{ $level='';}
if(isset($_GET['ck11'])) { $ck11 = $_GET['ck11'];  } else{ $ck11='';}
if(isset($_GET['rm11'])) { $rm11 = $_GET['rm11'];  } else{ $rm11='';}
if($ck11 == 'PASS'){}else{
    $text11 = 'ระดับการศึกษา : NOT PASS ('.$rm11.')';
    array_push($arr_text,$text11);
}

if(isset($_GET['u_level'])) { $u_level = $_GET['u_level'];  } else{ $u_level='';}
if(isset($_GET['ck12'])) { $ck12 = $_GET['ck12'];  } else{ $ck12='';}
if(isset($_GET['rm12'])) { $rm12 = $_GET['rm12'];  } else{ $rm12='';}
if($ck12 == 'PASS'){}else{
    $text12 = 'ระดับการศึกษา : NOT PASS ('.$rm12.')';
    array_push($arr_text,$text12);
}

if(isset($_GET['barch'])) { $barch = $_GET['barch'];  } else{ $barch='';}
if(isset($_GET['status'])) { $status = $_GET['status'];  } else{ $status='';}
if(isset($_GET['date'])) { $date = $_GET['date'];  } else{ $date='';}
if(isset($_GET['rm_status'])) { $rm_status = $_GET['rm_status'];  } else{ $rm_status='';}


// set meg
$header1 = 'รายการตรวจสอบข้อมูลผู้เช่าซื้อ';
$header2 = 'ส่วนของสถาบัน';

if($status=='Approve'){
    $message = "\n".
    'สถานะอนุมัติ : ' . $status. "\n" .
    '------------------------------'."\n".
$header1 .  "\n" .
'สาขา: ' . $barch . "\n" .
'เลขที่ใบคำขอ: ' . $app_num ."\n" .
'------------------------------'."\n".
'ชื่อ - นามสกุล  ' . $name."\n" .
 'เบอร์โทรศัพท์  : ' . $phone. "\n" .
 '------------------------------'."\n".
'-- ข้อมูลพิจารณา --'."\n" .
'สถานะอนุมัติ : ' . $status. "\n" .
'วันที่อนุมัติ :'.$date. "\n";
}else if($status=='Reject'){
    $message = "\n".
    'สถานะอนุมัติ : ' . $status. "\n" .
    '------------------------------'."\n".
    $header1 .  "\n" .
    'สาขา: ' . $barch . "\n" .
    'เลขที่ใบคำขอ: ' . $app_num ."\n" .
    '------------------------------'."\n".
    'ชื่อ - นามสกุล  ' . $name ."\n" .
    'เบอร์โทรศัพท์  : ' . $phone. "\n" .
    '------------------------------'."\n".
    '-- ข้อมูลพิจารณา --'."\n" .
    'สถานะอนุมัติ : ' . $status. "\n" .
    'วันที่อนุมัติ :'.$date. "\n";
}
else if($status=='Rework'){
    $message = "\n".
    'สถานะอนุมัติ : ' . $status. "\n" .
    '------------------------------'."\n".
    $header1 .  "\n" .
    'สาขา: ' . $barch . "\n" .
    'เลขที่ใบคำขอ: ' . $app_num ."\n".
    
    '------------------------------'."\n";
    foreach ($arr_text as $value) { $message .= $value."\n"; };
    $message .=   
    '-- ข้อมูลพิจารณา --'."\n" .
    'สถานะอนุมัติ : ' . $status. "\n" .
    'วันที่อนุมัติ :'.$date. "\n".
    'คำอธิบายเพิ่มเติม :'.$rm_status. "\n";
}

//setbarvh

    if($barch_type==1){
    // U-Store
    $token_b = 'DCBppKZlonVA5QGBRWXznmRncqMrdU03k86CvZ00wme';
    // $token_b = 'RqULZ7a2f8Ib415MgHeW9z2zirPcaMWosscXrEfwL6P';

    }else if($barch_type==2){
        // BaNANA
        $token_b = 'gjB38Ty9OgwuwnV71rgV7fJ0hTzdJa3NpWH9PUwrP4p';
        // $token_b = 'RqULZ7a2f8Ib415MgHeW9z2zirPcaMWosscXrEfwL6P';

    }else if($barch_type==3){
        // Studio 7
        $token_b = 'fLQm8OzAfIQ14xOn2g7f9vRmeUK7biwDg7YObKdefoc';
        // $token_b = 'RqULZ7a2f8Ib415MgHeW9z2zirPcaMWosscXrEfwL6P';

    }else{
        $token_b = 'RqULZ7a2f8Ib415MgHeW9z2zirPcaMWosscXrEfwL6P';

    }
        


if(isset($_GET['app_num'])&&isset($_GET['ck01'])&&isset($_GET['ck02'])&&isset($_GET['ck03'])&&isset($_GET['ck04'])&&isset($_GET['ck05'])&&isset($_GET['ck06'])&&isset($_GET['ck07'])&&isset($_GET['ck08'])&&isset($_GET['ck10'])&&isset($_GET['ck11'])&&isset($_GET['ck12'])&&isset($token_b)){
    // print_r($arr_text);
    // echo $message;
    try{
        bot($message,$token_b);
    }catch(Excetion $e){
        echo $e->getMessage();
    }
    
}else{
    echo 'err';
}











function bot($txt,$token_b){
    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set("Asia/Bangkok");

	$sToken = $token_b;
	$sMessage = $txt;

	
	$chOne = curl_init(); 
	curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt( $chOne, CURLOPT_POST, 1); 
	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
	curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
	$result = curl_exec( $chOne ); 

	//Result error 
	if(curl_error($chOne)) 
	{ 
		echo 'error:' . curl_error($chOne); 
	} 
	else { 
		$result_ = json_decode($result, true); 
		// echo "status : ".$result_['status']; echo "message : ". $result_['message'];
  
	} 
	curl_close( $chOne );   
}

// echo $_GET['app_num'].'<br>';
    // echo $_GET['name'].'<br>';
    // echo $_GET['barch_id'].'<br>';
    // echo $_GET['birthday'].'<br>';
    // echo $_GET['phone'].'<br>';
    // echo $_GET['tax'].'<br>';
    // echo $_GET['social'].'<br>';
    // echo $_GET['std_id'].'<br>';
    // echo $_GET['university'].'<br>';
    // echo $_GET['faculty'].'<br>';
    // echo $_GET['level'].'<br>';
    // echo $_GET['u_level'].'<br>';
    // echo $_GET['barch'].'<br>';
    // echo $_GET['status'].'<br>';
    // echo $_GET['u_level'].'<br>';
    // echo $_GET['date'].'<br>';
    // echo $_GET['rm_status'].'<br>';




// echo $_GET['ck01'].'<br>';
// echo $_GET['rm01'].'<br>';
// echo $_GET['ck02'].'<br>';
// echo $_GET['rm02'].'<br>';
// echo $_GET['ck03'].'<br>';
// echo $_GET['rm03'].'<br>';
// echo $_GET['ck05'].'<br>';
// echo $_GET['rm05'].'<br>';
// echo $_GET['ck06'].'<br>';
// echo $_GET['rm06'].'<br>';
// echo $_GET['ck04'].'<br>';
// echo $_GET['ck07'].'<br>';
// echo $_GET['rm07'].'<br>';
// echo $_GET['ck08'].'<br>';
// echo $_GET['rm08'].'<br>';
// echo $_GET['ck10'].'<br>';
// echo $_GET['rm10'].'<br>';
// echo $_GET['ck11'].'<br>';
// echo $_GET['rm11'].'<br>';
// echo $_GET['ck12'].'<br>';
// echo $_GET['rm12'].'<br>';
?>

<script langauge="javascript">
// checkconfirmclosewindow();
function checkconfirmclosewindow()
{
    window.close();
// if(!alert("กรุณาปิดหน้าจอลง")) window.close();;
}
setInterval(checkconfirmclosewindow,5000);
</script>
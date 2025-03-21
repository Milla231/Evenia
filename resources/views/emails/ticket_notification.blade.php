<!DOCTYPE html>
<html>
<head>
    <title>Notification de Participation</title>
</head>
<body>
    <p>Bonjour,</p>
    <p>{{ $messageContent }}</p>
    <p><strong>Événement :</strong> {{ $evenement->titre }}</p>
    <p>Date de début : {{ $evenement->date_debut }}</p>
    <p>Date de fin : {{ $evenement->date_fin }}</p>
    <p>Merci et à bientôt !</p>
</body>
</html>

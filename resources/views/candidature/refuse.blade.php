<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refus de candidature</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #d9534f;
            margin-top: 0;
        }
        p {
            margin-bottom: 15px;
        }
        .message {
            font-size: 18px;
            line-height: 1.4;
        }
        .contact-info {
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }
        .contact-info p {
            margin-bottom: 10px;
        }
        .note {
            font-size: 14px;
            color: #777;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Refus de candidature</h1>
        <div class="message">
            <p>Bonjour {{$candidature->candidat->prenom}} {{$candidature->candidat->nom}},</p>
            <p>Nous regrettons de vous informer que votre candidature pour le poste de <strong>{{$candidature->offreEmploi->poste}}</strong> chez <strong>{{$candidature->offreEmploi->recruteur->nom_entreprise}}</strong> n'a pas été retenue.</p>
            <p>Nous vous remercions pour l'intérêt que vous avez porté à notre entreprise et nous vous souhaitons beaucoup de succès dans vos futures recherches.</p>
        </div>
        <div class="contact-info">
            <p><strong>Email :</strong> {{$candidature->offreEmploi->recruteur->user->email}}</p>
            <p><strong>Téléphone :</strong> {{$candidature->offreEmploi->recruteur->tel}}</p>
        </div>
        <p class="note">Nous apprécions le temps que vous avez consacré à postuler chez nous. Merci encore et bonne continuation.</p>
    </div>
</body>
</html>

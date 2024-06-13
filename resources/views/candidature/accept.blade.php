<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de candidature</title>
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
            color: #007bff;
            margin-top: 0;
        }
        p {
            margin-bottom: 15px;
        }
        .contact-info {
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }
        .contact-info p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Félicitations ! Votre candidature a été acceptée</h1>
        <p>Bonjour {{$candidature->candidat->prenom}} {{$candidature->candidat->nom}},</p>
        <p>Nous avons le plaisir de vous informer que votre candidature pour le poste de <strong>{{$candidature->offreEmploi->poste}}</strong> chez <strong>{{$candidature->offreEmploi->recruteur->nom_entreprise}}</strong> a été retenue pour une entrevue.</p>
        <p>Veuillez trouver ci-dessous les coordonnées pour nous contacter :</p>
        <div class="contact-info">
            <p><strong>Email :</strong> {{$candidature->offreEmploi->recruteur->user->email}}</p>
            <p><strong>Téléphone :</strong> {{$candidature->offreEmploi->recruteur->tel}}</p>
        </div>
        <p>Nous sommes impatients de vous rencontrer et de discuter de vos compétences et expériences.</p>
        <p>Merci et à bientôt !</p>
    </div>
</body>
</html>

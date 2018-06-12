<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>update post</title>
</head>
<body>
    <h1>Modificaton du post</h1>
    {{-- Dans le mail, on va envoyer le titre du post qui se réfère au nom ou à l'adresse email de l'utilisateur de ce me post --}}
    <h2>Nouveau titre: titre {{$post->titre}}</h2>
     {{-- Dans le mail, on va envoyer le contenu du post qui se réfère au nom ou à l'adresse email de l'utilisateur de ce me post --}}
    <h2>Nouveau contenu</h2>
    {{$post->contenu}}
    
</body>
</html>
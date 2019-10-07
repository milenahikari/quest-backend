<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
  <title>QUEST</title>
  <style>
    * {
      margin: 0px;
      padding: 0px;
    }

    html {
      font-family: 'Nunito Sans', sans-serif;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      background: #FAFAFA;
    }

    .container-body {
      padding: 30px;
    }

    .wrapper-logo {
      width: 100%;
      height: 150px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .wrapper-logo a {
      width: 100%;
      height: 40%;
      display: flex;
      justify-content: center;
    }

    .logo {
      width: 30%;
    }

    .wrapper-title {
      background: #B41286;
      text-align: center;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 150px;
    }

    .wrapper-title h1 {
      color: white;
    }

    .wrapper-title-monitor {
      text-align: center;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 30px;
    }

    .title-monitor {
      color: #B41286;
    }

    p {
      font-size: 1.5em;
      margin: 1.5rem;
    }

    .quest-rodape {
      text-align: center;
      margin-bottom: 50px;
    }

    .img-rodape {
      max-width: 100%;
    }
  </style>
</head>

<body>
  <div class='container'>
    <div class='wrapper-logo'>
      <a href="#">
        <img class='logo' src='https://i.ibb.co/gvKbG60/quest.png'>
      </a>
    </div>

    <div class="wrapper-title">
      <h1>Solicitação de aula</h1>
    </div>

    <div class="wrapper-title-monitor">
      <h2 class="title-monitor">Olá, {{ $monitorName }}!</h2>
    </div>

    <div class="container-body">
      <p>A aluna <strong>{{ $userName }}</strong> precisa da sua ajuda e você é o único que pode ajudar com a matéria!</p>
      <p>Mensagem de Mocinga:</p>

      <p><i>{{ $mensagem }}</i></p>

      <p>E ai, topa?</p>
      <p class="quest-rodape">Abraços, <br> Equipe QUEST</p>

      <img class="img-rodape" src="https://i.ibb.co/gTNBbhQ/undraw-team-chat-y27k.png">
    </div>

  </div>
</body>

</html>
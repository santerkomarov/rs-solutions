<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Artisan CLI</title>
   <style>
      body {
         margin: 0;
         padding: 0;
         width: 100vw;
         height: 100vh;
         display: grid;
         font-family: "Roboto", sans-serif;
         background-color: #483D8B;
         color: #fff; 
      }
      div {
         max-width: 700px;
         align-self: center;
         justify-self: center;
      }
      div h2 {
         color: #FF1493;
      }
      div p {
         color: #00BFFF;
         margin-bottom: 20px;
      }
      div p a {
         color: #ccc;
         letter-spacing: 1px;
         transition: 0.3s;
      }
      div p a:hover {
         color: #FF1493;
      }

   </style>
</head>
<body>
   <div>
      <h2>{{ $message ?? '$message is empty' }}</h2>
      <p>Executed command: <b>{{ $command ?? '$command is empty' }}</b></p>
      <p><a href="{{ route('artisan_migrate') }}">migrate</a></p>
      <p><a href="{{ route('artisan_rollback') }}">rollback</a></p>
      <p><a href="{{ route('home') }}">HOME</a></p>
   </div>
</body>
</html>
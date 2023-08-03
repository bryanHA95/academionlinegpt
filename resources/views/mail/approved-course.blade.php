<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #dddddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .header {
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
            text-align: center;
            font-size: 24px;
        }

        .content {
            padding: 20px;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        footer {
            background-color: #f8f8f8;
            text-align: center;
            padding: 10px;
            color: #777777;
            font-size: 14px;
            border-top: 1px solid #dddddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            AcademiOnlineGPT
        </div>
        <div class="content">
            <h1>Buenas Noticias</h1>
            <p> Hola {{$course->teacher->name}}, </p>
            <p>Gracias por pertenecer a <strong>AcademiOnline GPT.</strong> Nos comunicamos con usted para informarle que:</p>
            <ul>
                <li>El curso <strong>{{$course->title}}</strong> se ha aprobado con éxito.</li>
            </ul>
            <p>Para más detalles, visite nuestro sitio web con sus credenciales: <a href="http://academionlinegpt.test/instructor/courses">http://academionlinegpt.test/instructor/courses</a>.</p>
        </div>
        <div class="footer">
            Este correo fue enviado por <strong>AcademiOnlineGPT</strong>. &copy; 2023 Todos los derechos reservados.
        </div>
    </div>

</body>
</html>
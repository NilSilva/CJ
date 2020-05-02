<!DOCTYPE>
<html>

    <head>

    <meta charset="utf-8">
    <meat name="description" content="Exemplo de um site vulnerável a ClickJacking">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CJ - homepage</title>

    </head>

    <body>

        <style>

            ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #111;
            }

            li {
            float: right;
            }

            li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            }

            li a:hover {
            background-color: #000;
            }

        </style>

        <header>

            <nav>

                

                <ul>

                    <li style="float:left;">
                    
                        <a href="#">

                            <img style="max-width:20px; height:auto; padding: 0px;" src="img/logo.png" alt="Logo" />

                        </a>
                    
                    </li>

                    <li><a href="index.php">Home</a></>

                    <li><a href="#">Sobre mim</a></li>

                    <li><a href="#">Contacto</a></li>

                    <li><a href="#">Privacidade</a></li>

                </ul>
                
            </nav>

        </header>